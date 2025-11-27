<?php
require_once __DIR__ . '/../../App/Core/DB.php';
require_once __DIR__ . '/../../App/Core/Model.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $name = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $surname = $_POST['surname'] ?? '';
}

$pdo= DB::getInstance();
$model = new Model($pdo, 'users');
$model->insert([
        'name' => $name,
    'email' => $email,
    'surname' => $surname
]   );

header("Location: http://localhost/MVC_/View/userTable.php");
exit;



?>   