<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #007bff; 
            color: white; 
        }

        .container {
            text-align: center;
            background-color: #ffffff; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
        }

        p {
            font-size: 24px;
            margin-bottom: 20px;
            color: black; 
        }

        button {
            padding: 10px 20px;
            background-color: #007bff; 
            color: white; 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease; 
        }

        button:hover {
            background-color: #0056b3; 
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Facebook Page Integration</p>

        <form action="manage.php" method="POST">
            <button type="submit" name="connect">Connect Page</button>
        </form>
    </div>
</body>
</html>
