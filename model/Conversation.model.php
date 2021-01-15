<?php

namespace caducee\Model;
require_once(DIR . "/model/Model.php");


/**
 * Class Conversation
 * @package caducee\Model
 * Database mode for conversation table
 */
class Conversation extends Model
{

    /**
     * Conversation constructor.
     * @param int $hid
     */
    public function __construct(int $hid)
    {
        $this->table = "conversation";
        $this->id_column = "id_conv";
        $this->from = "(SELECT * FROM conversation cc JOIN users u ON cc.id_user=u.NSS WHERE u.id_hospital=" . $hid . " ) as c";
        $this->get_connection();
    }

    /**
     * Get all conversation
     * @return Array
     */
    public function get_all(): Array
    {
        $sql = sprintf("SELECT c.id_user, c.id_conv, c.open_datetime c.Nom, c.Prenom FROM %s", $this->from);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["hid" => $_SESSION["hospital_id"]]);
        return $stmt->fetchAll();
    }

    /**
     * Get one conversation corresponding to the id
     * @return Array
     */
    public function get_one()
    {
        $sql = sprintf("SELECT * FROM %s WHERE c.NSS=:uid", $this->from);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["uid" => $this->id]);
        $conv = $stmt->fetch();
        if (!$conv) {
            $sql_insert = "INSERT INTO conversation(id_user) VALUES (:uid)";
            $stmt_insert = $this->conn->prepare($sql_insert);
            $stmt_insert->execute(["uid" => $this->id]);
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(["uid" => $this->id]);
            $conv = $stmt->fetch();
        }
        return $conv;
    }

}