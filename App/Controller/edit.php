<?php
require_once '../Core/Model.php';
require_once '../Core/DB.php';  
$pdo = DB::getInstance();
$model = new Model($pdo,'users');

$id= isset($_POST['id']) ? (int)$_POST['id'] : null;
if(!$id){
    die("ID topilmadi ");
}
$stmt=$pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id'=>$id]);
$user=$stmt->fetch(PDO::FETCH_ASSOC);

if(!$user){
    die("Foydalanuvchi topilmadi ");
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit User</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f4f8;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .edit-form {
        background-color: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        width: 350px;
    }
    .edit-form h2 {
        text-align: center;
        color: #007BFF;
        margin-bottom: 25px;
    }
    .edit-form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }
    .edit-form input[type="text"],
    .edit-form input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }
    .edit-form button {
        width: 100%;
        padding: 12px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }
    .edit-form button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<div class="edit-form">
    <h2>Edit User</h2>
    <form action="updateUser.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        
        <label for="email">surname</label>
        <input type="text" name="surname" id="email" value="<?php echo htmlspecialchars($user['surname']); ?>" required>

        <button type="submit">Update</button>
    </form>
</div>

</body>
</html>