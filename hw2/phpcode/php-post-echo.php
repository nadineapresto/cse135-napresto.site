<?php 
// Set cache control to no cache
header("Cache-Control: no-cache");

// Set content type to HTML
header("Content-Type: text/html");

// Print HTML file top
echo "<!DOCTYPE html>\n";
echo "<html><head><title>POST Request Echo</title>\n";
echo "</head><body><h1 align=\"center\">POST Request Echo</h1>\n";
echo "<hr>\n";

// Get message body from standard input
$form_data = file_get_contents('php://input');

// Parse the form data
if (!empty($form_data)) {
    parse_str($form_data, $params);
}
        
echo "<b>Message Body:</b><br />\n";

// Print out parsed data
echo "<ul>\n";
if (!empty($params)) {
    foreach ($params as $key => $value) {
        echo "<li>$key = $value</li>\n";
    }
}
echo "<ul>\n";

// Print HTML file bottom
echo "</body></html>";
?>