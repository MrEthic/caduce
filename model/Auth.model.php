<?php

namespace caducee\Model;

require_once(DIR . "/model/Model.php");

class auth extends Model
{

    public function __construct()
    {
        $this->table = "user";
        $this->id_column = "NSS";
        $this->get_connection();
    }

    /**
     * authenticate user
     *
     * @param string $mail Mail of the user
     * @return Array the user with the specific mail or false if no users exist
     */
    public function authenticator(string $mail)
    {
        $users_query = $this->conn->prepare("SELECT * FROM user WHERE Mail = ? ");
        $users_query->execute(array($mail));
        if ($users_query->rowCount() != 1) {
            return false;
        }
        return $users_query->fetch();
    }

}