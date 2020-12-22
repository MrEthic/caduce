<?php

namespace caducee\Model;
require_once(DIR . "/model/Model.php");


class Conversation extends Model
{

    public function __construct(int $hid)
    {
        $this->table = "conversation";
        $this->id_column = "id_conv";
        $this->from = "(SELECT * FROM conversation cc JOIN user u ON cc.id_user=u.NSS WHERE u.role_id=6 AND u.id_hospital=" . $hid . " ) as c";
        $this->get_connection();
    }

    public function get_all(): Array
    {
        $sql = sprintf("SELECT c.id_user, c.id_conv, c.open_datetime c.Nom, c.Prenom FROM %s", $this->from);
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["hid" => $_SESSION["hospital_id"]]);
        return $stmt->fetchAll();
    }

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