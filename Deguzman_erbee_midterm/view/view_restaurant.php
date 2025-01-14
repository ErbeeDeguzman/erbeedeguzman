<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); 
    exit;
}

echo "<h1>Welcome, " . $_SESSION['email'] . "!</h1>";
echo "<p>You are successfully logged in.</p>";
echo "<a href='logout.php'>Logout</a>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    
    <div class="container-fluid p-5" id="front-page">
        <h1>This is my restaurant</h1>
        <button onclick="view_menu()" class="btn btn-primary">View menu</button>
        <button onclick="view_order()" class="btn btn-info">View order</button>
    </div>


    <script src="js/main.js"></script>
</body>
</html>