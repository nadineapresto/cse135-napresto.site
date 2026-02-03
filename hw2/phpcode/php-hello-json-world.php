<?php
// Set content type to JSON
header("Content-Type: application/json");

// Get data from user to display on webpage
$datetime = date("Y-m-d H:i:s");
$ip_address = $_SERVER['REMOTE_ADDR'];

// Build JSON message with user data
$message = array('title' => 'Hello, PHP!', 'heading' => 'Hello, PHP! From Nadine Apresto!', 'message' => 'This page was generated with the PHP programming language', 'time' => $datetime, 'IP' => $ip_address);

// Convert to JSON message and output for webpage
echo json_encode($message);
?>