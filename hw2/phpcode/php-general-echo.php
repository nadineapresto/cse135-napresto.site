<?php 
// Set cache control to no cache
header("Cache-Control: no-cache");

// Set content type to HTML
header("Content-Type: text/html");

// Print HTML file top
echo "<!DOCTYPE html>\n";
echo "<html><head><title>General Request Echo</title>\n";
echo "</head><body><h1 align=\"center\">General Request Echo</h1>\n";
echo "<hr>\n";

// Get HTTP Protocol, HTTP Method, and Query String
$protocol = $_SERVER['SERVER_PROTOCOL'];
$method = $_SERVER['REQUEST_METHOD'];
$query_string = $_SERVER['QUERY_STRING'];

// Print HTTP Protocol, HTTP Method, and Query String
echo "<p><b>HTTP Protocol:</b> $protocol</p>";
echo "<p><b>HTTP Method:</b> $method</p>";
echo "<p><b>Query String:</b> $query_string</p>";

// Get message body from standard input
$form_data = file_get_contents('php://input');

// Print message
echo "<b>Message Body:</b> $form_data<br />\n";

// Print HTML file bottom
echo "</body></html>";
?>