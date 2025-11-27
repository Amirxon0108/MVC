    
    <!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma'lumot kiritish</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f4ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: #fff;
            padding: 25px;
            width: 350px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .box h2 {
            text-align: center;
            color: #3366ff;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            width: 100%;
            margin-top: 15px;
            padding: 12px;
            border: none;
            background: #3366ff;
            color: #fff;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover {
            background: #1f4fe0;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Ma'lumot qo‘shish</h2>
    <form action="App/Controller/metod.php" method="POST">
        <input type="text" name="username" placeholder="Ism kiriting" required>
        <input type="email" name="email" placeholder="Email kiriting" required>
        <input type="text" name="surname" placeholder="kiriting" required>
    
        <button type="submit">Qo‘shish</button>
    </form>
</div>

</body>
</html>
