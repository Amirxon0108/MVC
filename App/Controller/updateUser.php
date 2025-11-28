<?php
require_once '../Core/Model.php';
require_once '../Core/DB.php';

$pdo = DB::getInstance();
$model = new Model($pdo, 'users');


$id = isset($_POST['id']) ? (int)$_POST['id'] : null;
if(!$id){
    die("ID topilmadi");
}


$data = [
    'name' => $_POST['name'] ?? '',
    'email' => $_POST['email'] ?? '',
    'surname'=>$_POST['surname'] ?? ''
];


$model->update($id, $data);


header("Location: ../../View/userTable.php");
exit;
