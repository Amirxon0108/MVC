<?php
require_once '../Core/Model.php';
require_once '../Core/DB.php';  
$id=isset($_POST['id']) ? (int)$_POST['id']: null;

if(!$id){
    header("Location: http://localhost/MVC_/View/userTable.php");
    exit;   
}
$pdo = DB::getInstance();
$model = new Model($pdo,'users');
$model->delete($id);    
header("Location: http://localhost/MVC_/View/userTable.php");
exit;
?>