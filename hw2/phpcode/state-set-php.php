<?php
header("Cache-Control: no-cache");
header("Content-Type: text/html");

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Set cookies (expire in 1 hour)
    $expiry = time() + 3600;
    setcookie('user_name', $_POST['name'], $expiry, '/');
    setcookie('user_color', $_POST['color'], $expiry, '/');
    
    // Redirect to show page
    header("Location: https://napresto.site/cgi-bin/state-show-php.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP State - Set Data</title>
</head>
<body>
    <h1>PHP State Management - Set Data</h1>
    <hr>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        
        <label for="color">Favorite Color:</label>
        <input type="text" id="color" name="color" required>
        <br><br>
        
        <button type="submit">Save Data</button>
    </form>
</body>
</html>