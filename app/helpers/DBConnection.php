<?php

class Connection {

    private $hostname = "php-db";
    private $username = "user";
    private $password = "password";
    private $dbname = "celuweb_database";
    private $connection;

    public function __construct() {
        $this->connection = mysqli_connect(
            $this->hostname,
            $this->username,
            $this->password,
            $this->dbname
        );
        if(mysqli_connect_error()){
            printf("Error en la conexión: %s <br>",mysqli_connect_error());
            exit();
        }
    }

    public function dbResponse ( $query ) {
        if($query!=""){
            $data = array();
            $dbData = mysqli_query($this->connection,$query);
            for ($dbResponse = array (); $row = $dbData->fetch_assoc(); $dbResponse[] = $row);
        }
        return $dbResponse;
    }

    public function close(){
        mysqli_close($this->connection);
    }

}

?>
