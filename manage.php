<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage FB Page Connection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0056b3; 
            color: white; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .link {
            margin: 10px;
            font-size: 16px;
            color: #007bff; 
            text-decoration: none;
        }

        .link:hover {
            text-decoration: underline; 
        }

        .button-container {
            margin-top: 20px; 
        }

        .button-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 200px; 
        }

        .button-container button.delete-btn {
            background-color: #FF0000; 
            color: white; 
        }

        .button-container button.delete-btn:hover {
            background-color: #A0522D;
        }

        .button-container button.reply-btn {
            background-color: #007bff; 
            color: white; 
            margin-left: 20px; 
        }

        .button-container button.reply-btn:hover {
            background-color: #003d7f; 
        }

        p {
            color: black; 
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Facebook Integration Page</p>
        <p>Integrated Page: Amazon Business</p>

        <form method="POST" action="delete.php" class="button-container">
            <button type="submit" class="delete-btn">Delete Integration</button>
        </form>

        <!-- Reply to Messages button -->
        <form method="POST" action="reply.php" class="button-container">
            <button type="submit" class="reply-btn">Reply to Messages</button>
        </form>
    </div>
</body>
</html>
