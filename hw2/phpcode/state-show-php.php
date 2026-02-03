<?php
header("Cache-Control: no-cache");
header("Content-Type: text/html");
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP State - Show Data</title>
</head>
<body>
    <h1>PHP State Management - Show Data</h1>
    <hr>
    
    <?php if (isset($_COOKIE['user_name']) && isset($_COOKIE['user_color'])): ?>
        <p><b>Name:</b> <?php echo htmlspecialchars($_COOKIE['user_name']); ?></p>
        <p><b>Favorite Color:</b> <?php echo htmlspecialchars($_COOKIE['user_color']); ?></p>
    <?php else: ?>
        <p>No data saved yet.</p>
    <?php endif; ?>
    
    <br>
    <a href="php-state-set.php">Set New Data</a> | 
    <a href="php-state-destroy.php">Clear Data</a>
</body>
</html>