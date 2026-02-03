<?php 
// Set cache control to no cache
header("Cache-Control: no-cache");

// Set content type to HTML
header("Content-Type: text/html");

// Get request info
$request_method = $_SERVER['REQUEST_METHOD'];
$content_type = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';
$query_string = $_SERVER['QUERY_STRING'];
$hostname = gethostname();
$datetime = date("D M j H:i:s Y");
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Unknown';
$ip_address = $_SERVER['REMOTE_ADDR'];

// Print HTML file top
echo "<!DOCTYPE html>\n";
echo "<html><head><title>General Request Echo</title>\n";
echo "</head><body><h1 align=\"center\">General Request Echo</h1>\n";
echo "<hr>\n";

// Print request information
echo "<h2>Request Information:</h2>\n";
echo "<p><b>HTTP Method:</b> $request_method</p>\n";
echo "<p><b>Content-Type:</b> $content_type</p>\n";
echo "<p><b>Hostname:</b> $hostname</p>\n";
echo "<p><b>Date/Time:</b> $datetime</p>\n";
echo "<p><b>User Agent:</b> $user_agent</p>\n";
echo "<p><b>IP Address:</b> $ip_address</p>\n";

echo "<h2>Request Data:</h2>\n";

// Initialize data array to print for the user
$data = array();

// Handle GET request
if ($request_method == "GET") {
    echo "<p><b>Query String:</b> $query_string</p>\n";
    if (!empty($_GET)) {
        $data = $_GET;
    }
}

// Handle POST, PUT, DELETE requests
else {
    $raw_input = file_get_contents('php://input');
    echo "<p><b>Raw Input:</b> $raw_input</p>\n";
    
    // Check if content type is JSON
    if (strpos($content_type, 'application/json') !== false) {
        echo "<p><b>Encoding:</b> application/json</p>\n";
        $data = json_decode($raw_input, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "<p style='color:red;'>JSON decode error: " . json_last_error_msg() . "</p>\n";
        }
    }
    // Otherwise treat as form-urlencoded
    else {
        echo "<p><b>Encoding:</b> x-www-form-urlencoded</p>\n";
        parse_str($raw_input, $data);
    }
}

// Print parsed data
echo "<h3>Parsed Parameters:</h3>\n";
if (!empty($data)) {
    echo "<ul>\n";
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            $value = json_encode($value);
        }
        echo "<li><b>$key:</b> $value</li>\n";
    }
    echo "</ul>\n";
} else {
    echo "<p>No parameters received.</p>\n";
}

// Print HTML file bottom
echo "</body></html>";
?>