<?php

require_once __DIR__ . '/../App/Core/DB.php';
require_once __DIR__ . '/../App/Core/Model.php';

$pdo = DB::getInstance();
$db = new Model($pdo, 'users');

$users=$db->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Users Table</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="max-w-5xl mx-auto mt-10">
    <h1 class="text-3xl font-semibold mb-5 text-gray-800">Users List</h1>

    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
        <table class="min-w-full text-left text-gray-800">
            <thead>
                <tr class="bg-gray-200 text-gray-700 uppercase text-sm">
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">Name</th>
                    <th class="py-3 px-4">Surname</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Actions</th>
                </tr>
            </thead>

            <tbody>
              <?php foreach($users as $u): ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4"><?= $u['id']?></td>
                    <td class="py-3 px-4"><?= htmlspecialchars($u['name'])?></td>
                    <td class="py-3 px-4"><?= htmlspecialchars($u['surname'])?></td>
                    <td class="py-3 px-4"><?= htmlspecialchars($u['email'])?></td>
                    <td class="py-3 px-4 flex gap-2">
                        <form action="../App/Controller/edit.php" method="POST">
                            <input type="hidden" name="id" value="<?= $u['id'] ?>">
                        <input type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm" value="Edit" >
                          </form>  
                        <form action="../App/Controller/delete.php" method="POST">
                            <input type="hidden" name="id" value="<?= $u['id'] ?>">
                        <input type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm" value="Delete" >
               </form>     
              </td>
                </tr>
<?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
