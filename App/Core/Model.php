<?php
require_once  'DB.php';

class Model{
protected $table;
protected $pdo;
public function __construct($pdo,$table){
    $this->pdo = $pdo;    
    $this->table= $table;
}
public function insert($data){
    $columns = implode(",", array_keys($data));
    $placeholders = ":" . implode(",:", array_keys($data)); 
    $stmt = $this->pdo->prepare("INSERT INTO {$this->table} ($columns) VALUES ($placeholders)");
    $stmt->execute($data);  
       return $this->pdo->lastInsertId();

}
public function FetchAll(){
    $stmt=$this->pdo->prepare("SELECT * FROM {$this->table} ");
    $stmt->execute();
    return $stmt->fetchAll();
}
public function delete($id){
   $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id=:id");
   $stmt->bindValue(':id', (int)$id ,PDO::PARAM_INT);
  return $stmt->execute();
   
}
public function update($id,$data){
$fields =[];
foreach ($data as $key=>$value){
  $fields[] = "$key = :$key";
}
$set = implode (', ',$fields);
$stmt =$this->pdo->prepare("UPDATE {$this->table} SET $set WHERE id =:id");
$data ['id'] = $id;
return $stmt->execute($data);

}
}