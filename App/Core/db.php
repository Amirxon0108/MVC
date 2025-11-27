<?php
class DB{
private $host = "localhost";
private $db_name = "oop";   
private $username = "root";
private $password = ""; 
public $pdo;
protected static $instance = null;
public function __construct(){
    $dsn = "mysql:host={$this->host};dbname={$this->db_name}";

   $options =[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
   ]  ;
    try{
     $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
    } catch (PDOException $e){
     die("Connection failed: " . $e->getMessage());
    }
}
public static function getInstance(){
    if (self::$instance === null){
        self::$instance = new self();
    }
    return self::$instance->pdo;
}}