<?php

namespace caducee\Model;
use Exception;

require_once(DIR . "/model/Model.php");

/**
 * Class user
 *
 * User Model, linked to the user table
 * Handle all users fetching, creation and update
 */
class Users extends Model
{

    /**
     * user constructor.
     *
     */
    public function __construct()
    {
        $this->table = "users";
        $this->id_column = "NSS";
        $this->get_connection();
    }

    /**
     * Get all users
     * @return array All users
     */
    public function get_hospital($hid): array
    {
        $sql = sprintf("SELECT * FROM users WHERE id_hospital=%s", $hid);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    /**
     * Get one user according to the id
     *
     * @return array User matching id
     */
    public function get_one()
    {
        $sql = "SELECT *, CONCAT(adresse.zip, ', ', adresse.city) as 'Adresse' FROM users u JOIN adresse ON adresse.id_adresse=u.id_adresse WHERE u.NSS=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":id" => $this->id]);
        $result = $stmt->fetch();
        return $result;
    }

    /**
     * Get all users where string $filter id either in NSS, Name, Surname, Mail or phone number of user
     *
     * @param string $filter A string of the filter to search
     * @return array Users matching the filter
     */
    public function global_filter(string $filter): array
    {
        $sql = "SELECT u.* FROM users u WHERE CONCAT(NSS, ' ', Nom, ' ', Prenom, ' ', Mail, ' ', Tel) REGEXP :filter";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":filter" => $filter]);
        $result = $stmt->fetchAll();
        return $result;
    }

    /**
     * Get all user matching filter with the $filter_mode corresponding (either OR or AND)
     *
     * Example :
     * <code>
     * $filter = [
     *      "name" => "Andrew",
     *      "mail" => "gmail"
     * ];
     * $filter_mode = "OR";
     * // Will return all user with either : a name containing Andrew, or a mail containing gmail
     * </code>
     *
     * @param array $filters Table of all filter as "Column" => "must_contain_value"
     * @param string $filter_mode Either "OR" or "AND"
     * @return array Users matching complex filter
     */
    public function complexe_filter(array $filters, string $filter_mode): array
    {
        $sql = "SELECT * FROM users WHERE (";
        foreach ($filters as $key => $value) {
            if ($key == "dateA" or $key == "dateB" or $value == "") {
                continue;
            }
            $sql .= sprintf(" %s REGEXP :%s %s", $key, $key, $filter_mode);
        }
        if (isset($filters["dateA"]) and isset($filters["dateB"])) {
            $sql .= " Creation_Date BETWEEN :dateA AND :dateB" .$filter_mode;
        }
        if ($filter_mode == "OR") {
            $sql = substr($sql, 0, -2);
        } else {
            $sql = substr($sql, 0, -3);
        }
        $sql .= ")";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($filters);
        $result = $stmt->fetchAll();
        return $result;
    }

    /**
     * Create a user row in the database and an address row corresponding
     * Transaction is used to prevent duplicates address in case of errors in user insert query
     *
     * @param array $params Table of all parameters to create a user (address lines, city, zip code, country, NSS, Last Name, First Name, Mail, Phone)
     * @return bool True if the user was created
     * @throws PDOException|Exception Database failing
     */
    public function create(array $params): bool
    {
        $sql_check = "SELECT * FROM user WHERE Mail=:mail OR NSS=:nss";
        $stmt_check = $this->conn->prepare($sql_check);
        $stmt_check->execute([":mail" => $params["mail"], ":nss" => $params["NSS"]]);
        if($stmt_check->rowCount() != 0) {
            return False;
        }
        $sql_adrr = "INSERT INTO adresse (line_a, line_b, city, zip, country) VALUES (:adr_line_1, :adr_line_2, :city, :code, :country)";
        $sql_user = "INSERT INTO user (NSS, Nom, Prenom, Mail, hash_password, Tel, id_adresse, id_hospital, Genre) VALUES (:nss, :nom, :prenom, :mail, :password, :tel, :id_adress, :id_hospital, :gender)";
        $provide_password = Users::generate_password();
        $hashed_password = password_hash($provide_password, PASSWORD_DEFAULT);
        $user_values = [
            "nss" => $params["NSS"],
            "prenom" => $params["prenom"],
            "nom" => $params["nom"],
            "mail" => $params["mail"],
            "password" => $hashed_password,
            "tel" => $params["tel"],
            "id_hospital" => $params["hid"],
            "gender" => substr($params["NSS"], 0, 1) == "1" ? 0 : 1
        ];
        $adrr_values = [
            "adr_line_1" => $params["adress_1"],
            "adr_line_2" => $params["adress_2"],
            "code" => $params["postal"],
            "city" => $params["city"],
            "country" => "France"
        ];
        try {
            $this->conn->beginTransaction();
            $stmt_adrr = $this->conn->prepare($sql_adrr);
            $stmt_adrr->execute($adrr_values);
            $adrr_id = $this->conn->lastInsertId();
            $user_values["id_adress"] = $adrr_id;
            $stmt_user = $this->conn->prepare($sql_user);
            $stmt_user->execute($user_values);
            $this->conn->commit();
        } catch (PDOException $e) {
            $this->conn->rollback();
            throw $e;
        }
        Users::send_password($params["mail"], $provide_password, $params["nom"], $params["prenom"]);
        return true;
    }

    /**
     * Generate a random password using random_bytes
     *
     * @return string The generated password
     * @throws Exception If entropy is to low (should never happen)
     */
    private static function generate_password(): string
    {
        $bytes = random_bytes(8);
        return bin2hex($bytes);
    }

    /**
     * Send credential by mail to the user
     *
     * @param string $mail Mail adress of the user
     * @param string $password Password of the user
     * @param string $nom Last Name of the user
     * @param string $prenom First Name of the user
     */
    private static function send_password(string $mail, string $password, string $nom, string $prenom): void
    {
        $objet = "Votre mot de passe caducee.fr";
        $msg = file_get_contents(DIR . "/public/html/new_user_mail.html");
        $msg = str_replace("!!!MAIL!!!", $mail, $msg);
        $msg = str_replace("!!!PASS!!!", $password, $msg);
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <caducee@4dgt.com>' . "\r\n";
        mail($mail, $objet, $msg, $headers);
    }

}
