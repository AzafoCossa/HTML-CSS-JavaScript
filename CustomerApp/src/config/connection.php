<?php

class connection{
  //Properties
  private $dbhost = 'localhost';
  private $dbuser = 'cossa';
  private $pass = 'Traficprogrammer9669!!';
  private $dbname = 'customerApp';

  //Connect
  public function connect(){
    $mysql_connect_str = "mysql:host=$this->dbhost; dbname=$this->dbname";
    $dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->pass);

    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConnection;
  }
}