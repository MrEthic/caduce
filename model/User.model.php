<?php
require_once(DIR . "/model/Model.php");

class user extends Model
{

    public function __construct()
    {
        $this->table = "user";
        $this->id_column = "NSS";
        $this->get_connection();
    }

    private static function send_password($mail, $password, $nom, $prenom)
    {
        $objet = "Votre mot de passe caducee.fr";
        $msg = file_get_contents(DIR . "/public/html/new_user_mail.html");
        $msg = str_replace("!!!MAIL!!!", $mail, $msg);
        $msg = str_replace("!!!PASS!!!", $password, $msg);
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <caducee@4dgt.com>' . "\r\n";
        mail($mail,$objet,$msg,$headers);
    }

    public function get_all()
    {
        $sql = "SELECT * FROM user WHERE role_id=6";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function get_one()
    {
        $sql = "SELECT user.*, CONCAT(adresse.zip, ', ', adresse.city) as 'Adresse' FROM user JOIN adresse ON adresse.id_adresse=user.id_adresse WHERE user.NSS=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":id" => $this->id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function global_filter($filter)
    {
        $sql = "SELECT * FROM user WHERE CONCAT(NSS, ' ', Nom, ' ', Prenom, ' ', Mail, ' ', Tel) REGEXP :filter";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":filter" => $filter]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function complexe_filter($filters, $filter_mode)
    {
        $sql = "SELECT * FROM user WHERE";
        foreach ($filters as $key => $value) {
            if ($key == "dateA" or $key == "dateB" or $value == "") {
                continue;
            }
            $sql .= sprintf(" %s REGEXP :%s %s", $key, $key, $filter_mode);
        }
        if ($filter_mode == "OR") {
            $sql = substr($sql, 0, -2);
        } else {
            $sql = substr($sql, 0, -3);
        }
        if (isset($filters["dateA"]) and isset($filters["dateB"])) {
            $sql .= $filter_mode . " Creation_Date BETWEEN :dateA AND :dateB";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($filters);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function create($params)
    {
        $sql_adrr = "INSERT INTO adresse (line_a, line_b, city, zip, country) VALUES (:adr_line_1, :adr_line_2, :city, :code, :country)";
        $sql_user = "INSERT INTO user (NSS, Nom, Prenom, Mail, hash_password, Tel, id_adresse, Genre) VALUES (:nss, :nom, :prenom, :mail, :password, :tel, :id_adress, :gender)";
        $provide_password = User::generate_password();
        $hashed_password = password_hash($provide_password, PASSWORD_DEFAULT);
        $user_values = [
            "nss" => $params["NSS"],
            "prenom" => $params["prenom"],
            "nom" => $params["nom"],
            "mail" => $params["mail"],
            "password" => $hashed_password,
            "tel" => $params["tel"],
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
        } catch (Exception $e) {
            $this->conn->rollback();
            throw $e;
        }
        User::send_password($params["mail"], $provide_password, $params["nom"], $params["prenom"]);

    }

    private static function generate_password(): string
    {
        $bytes = random_bytes(8);
        return bin2hex($bytes);
    }

}


?>