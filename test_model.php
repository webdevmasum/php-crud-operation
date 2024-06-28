<?php

class Test{
    private $servername     ='localhost';
    private $username       ='root';
    private $password       ='';
    private $dbname         ='oopcrud';
    private $connection;

    function __construct(){
        $this->connection = new mysqli($this->servername,$this->username,$this->password,$this->dbname);

        if($this->connection->connect_error){
            echo 'Connection Failed';
        }else{
            echo 'Connected';
        }
    }//function closed
}//class closed

$obj= new test();


?>