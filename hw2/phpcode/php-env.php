<?php
// Set cache control to no cache
header("Cache-Control: no-cache");

// Set content type to HTML
header("Content-Type: text/html");

// Print HTML file top
echo "<!DOCTYPE html>\n";
echo "<html><head><title>Environment Variables</title>\n";
echo "</head><body><h1 align="center">Environment Variables</h1>\n";
echo "<hr>\n";

// Loop over environment variables and print the variable name and its value
foreach ($_SERVER as $variable => $value) {
    echo "<b>$variable:</b> $value<br />\n";
}

// Print HTML file bottom
echo "</body></html>";
?>