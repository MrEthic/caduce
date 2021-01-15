<?php

namespace caducee\Model;

require_once(DIR . "/model/Model.php");

/**
 * Class Api
 * @package caducee\Model
 * Database model for Api purpose
 */
class Api extends Model
{

    /**
     * Api constructor.
     */
    public function __construct() {
        $this->table = "user";
        $this->id_column = "NSS";
        $this->get_connection();
    }

    /**
     * Check if the user has to be notified
     * @return mixed
     */
    public function is_notif() {
        $sql = "SELECT notify FROM user WHERE NSS=:uid";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["uid" => $_SESSION["NSS"]]);
        $res = $stmt->fetch()["notify"];
        if ($res == "1") {
            $sql_update = "UPDATE user SET notify=0 WHERE NSS=:uid";
            $stmt_update = $this->conn->prepare($sql_update);
            $stmt_update->execute(["uid" => $_SESSION["NSS"]]);
        }
        return $res;
    }

}