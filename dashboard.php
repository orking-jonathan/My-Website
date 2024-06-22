<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        .dashboard-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .dashboard-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .dashboard-container a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, SKR-CTF{<?= md5($_SESSION['username'] + $_SESSION['password']) ?>}!</h1>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
