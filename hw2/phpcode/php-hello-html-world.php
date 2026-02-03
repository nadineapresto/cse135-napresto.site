#!/usr/bin/php

<?php
// Set content type to HTML
header("Content-Type: text/html");

// Get data from user to display on webpage
$datetime = date("Y-m-d H:i:s");
$ip_address = $_SERVER['REMOTE_ADDR'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hello, PHP!</title>
    </head>
    <body>
        <h1 align=center>Hello PHP World</h1><hr/>
        <p>Hello World from Nadine Apresto!</p>
        <p>This page was generated with the PHP programming langauge</p>
        <p>This program was generated at: <?php echo $datetime; ?></p>
        <p>Your current IP Address is: <?php echo $ip_address; ?></p>
    </body>
</html>