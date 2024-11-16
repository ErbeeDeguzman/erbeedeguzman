<?php
// Start session to store login state
session_start();

if (isset($_POST['submit'])) {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

   
    require_once 'classes/connection.php';  

    
    $stmt = $connection->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        
        if (password_verify($password, $user['password'])) {
           
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header("Location: view/view_restaurant.php"); 
            exit;
        } else {
            
            $error = "Incorrect email or password.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        
        <button type="submit" name="submit" onclick="view_restaurant()">Login</button>
        
        
    </form>
    <script src="js/main.js"></script>
</body>
</html>




