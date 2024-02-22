<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_integration"])) {
        header("Location: registration.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Integration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0056b3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <p>Are you sure you want to disconnect the FB Page from your app?</p>
        <form method="POST">
            <button type="submit" name="delete_integration">Disconnect</button>
        </form>
    </div>
</body>
</html>
