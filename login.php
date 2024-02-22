<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "project";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['login'])){
    $email = $_POST['email']; 
    $password = $_POST['password'];  
    
    $sql = "SELECT * FROM data1 WHERE email = '$email' AND password = '$password'"; 
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){
        echo '<script>
            alert("Login successful");
            window.location.href = "welcome.php";
        </script>';
    } else {
        echo '<script>
            alert("Invalid email or password");
            window.location.href = "login.php";
        </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0056b3;
        }
        .container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .signup-link {
            text-align: center;
            margin-top: 10px;
        }
        .signup-link a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container"> 
        <h1>Login to your account</h1>
        <form action="login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember me</label><br><br>
            <button type="submit" name="login">Login</button>
        </form>
        <div class="signup-link">
            New to MyApp? <a href="registration.php">Sign up</a>
        </div>
    </div>
</body>
</html>
