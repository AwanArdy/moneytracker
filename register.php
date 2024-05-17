<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'config.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);
    if ($stmt->execute()) {
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required >
            <input type="email" name="email" placeholder="Email" required >
            <input type="password" name="password" placeholder="Password" required >
            <button type="submit">Register</button>
        </form>
    </body>
</html>