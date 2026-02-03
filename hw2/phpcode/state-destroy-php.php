<?php
// Clear cookies by setting expiry to the past
setcookie('user_name', '', time() - 3600, '/');
setcookie('user_color', '', time() - 3600, '/');

header("Cache-Control: no-cache");
header("Content-Type: text/html");
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP State - Clear Data</title>
</head>
<body>
    <h1>PHP State Management - Data Cleared</h1>
    <hr>
    <p>Your data has been cleared.</p>
    <br>
    <a href="state-set-php.php">Set New Data</a> | 
    <a href="state-show-php.php">View Data</a>
</body>
</html>