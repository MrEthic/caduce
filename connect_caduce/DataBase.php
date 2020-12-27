<?php
//on importe le fichier DataBaseConfig
//contenant le nom de la BDD, mdp, nom localhost
require "DataBaseConfig.php";

class DataBase
{
	//modificateur public accessible à toutes les classes
    public $connect;
    public $data;
    private $sql;
	//héritage variables protégées
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }


    //Connexion à la base de données définie dans DataBaseConfig
    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    //equivalent de prepare en PDO, car on utilise ici mysqli 
	// PDO versus mysqli 
	//PDO : flexible, requêtes simples, plus sécurisé grâce à prepare() 
	//Mysqli : plus rapide, requêtes plus complexes
    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    //fonction pour se connecter, appelée dans le fichier login.php
    function logIn($table, $username, $password)
    {
        $username = $this->prepareData($username);
        $password = $this->prepareData($password);
        $this->sql = "select * from " . $table . " where Nom = '" . $username . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbusername = $row['Nom'];
            $dbpassword = $row['password'];
            if ($dbusername == $username && password_verify($password, $dbpassword)) {
                $login = true;
            } else $login = false;
        } else $login = false;

        return $login;
    }


}

?>
