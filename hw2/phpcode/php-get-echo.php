<?php 
// Set cache control to no cache
header("Cache-Control: no-cache");

// Set content type to HTML
header("Content-Type: text/html");

// Print HTML file top
echo "<!DOCTYPE html>\n";
echo "<html><head><title>GET Request Echo</title>\n";
echo "</head><body><h1 align=\"center\">Get Request Echo</h1>\n";
echo "<hr>\n";

// Get Query String
$query_string = $_SERVER['QUERY_STRING'];
echo "<b>Query String:</b> $query_string<br />\n";

// Parse the query string
if (!empty($query_string)) {
    parse_str($query_string, $params);
    foreach ($params as $key => $value) {
        echo "$key = $value<br/>\n";
    }
}

// Print HTML file bottom
echo "</body></html>";
?>