<?php

class DataBaseConfig
{
    public $servername;
    public $username;
    public $password;
    public $databasename;

    //constructeur par défaut
    public function __construct()
    {
		//modifier plus tard	
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = '';
		//modifiez la table sql 
        $this->databasename = 'ticko';

    }
}

?>
