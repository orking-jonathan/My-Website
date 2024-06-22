<?php

session_start();

if (isset($_GET["error"])) {
    ?>
    <script>
        alert("Incorrect Username Or Password.");
        window.location = "login.php";
    </script>
    <?php
    exit;
}

$valid_username = "11000001111110000000111011011101111010100111011111110000000000000000000000000000000000000000000000000000000000000000000000000000";
$valid_password = "985018416362389919299449526314851988813397306789";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (base_convert(md5($username), 16, 2) === $valid_username && base_convert(sha1($password), 16, 10) === $valid_password) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.php?error=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="login.php" method="post" id="loginForm">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <div class="error" id="error"></div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            var username = document.getElementsByName('username')[0].value;
            var password = document.getElementsByName('password')[0].value;
            if (username === "" || password === "") {
                event.preventDefault();
                document.getElementById('error').innerText = "Please fill in both fields.";
            }
        });
    </script>
</body>
</html>