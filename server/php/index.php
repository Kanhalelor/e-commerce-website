<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Blockbuster 3.0</title>
    <meta charset="UTF-8">
</head>
<body>
    
    <h1>Welcome</h1>
    
    <?php if (isset($user)): ?>
        
        <p class="welcome-msg">Hello <?= htmlspecialchars($user["name"]) ?></p>
        
        <p class="logout"><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
        <p class="login"><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>
    
</body>
</html>