<?php 
// Print headers
header("Cache-Control: no-cache");
header("Content-Type: text/html");
print("\n");

// Get request info
$request_method = $_SERVER['REQUEST_METHOD'];
// Focusing on POST and GET for now
// $content_type = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';
// $query_string = $_SERVER['QUERY_STRING'];
$hostname = gethostname();
$date_time = date("D M j H:i:s Y");
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Unknown';
$ip_address = $_SERVER['REMOTE_ADDR'];

// Print HTML file top
echo "<!DOCTYPE html>\n";
echo "<html><head><title>General Request Echo - PHP</title>\n";
echo "</head><body><h1 align=\"center\">General Request Echo - PHP</h1>\n";
echo "<hr>\n";

// Print request information
echo "<h2>Request Information:</h2>\n";
echo "<p><b>HTTP Method:</b> $request_method</p>\n";
// echo "<p><b>Content-Type:</b> $content_type</p>\n";
echo "<p><b>Hostname:</b> $hostname</p>\n";
echo "<p><b>Date/Time:</b> $date_time</p>\n";
echo "<p><b>User Agent:</b> $user_agent</p>\n";
echo "<p><b>IP Address:</b> $ip_address</p>\n";

echo "<h2>Request Data:</h2>\n";

// Handle GET request
if ($request_method == "GET") {
    if (!empty($_GET)) {
        echo "<ul>\n";
        foreach ($_GET as $key => $value) {
            echo "<li><b>$key:</b> $value</li>\n";
        }
        echo "</ul>\n";
    } else {
        echo "<p>No GET parameters received.</p>\n";
    }
}

// Handle POST request
elseif ($request_method == "POST") {
    if (!empty($_POST)) {
        echo "<ul>\n";
        foreach ($_POST as $key => $value) {
            echo "<li><b>$key:</b> $value</li>\n";
        }
        echo "</ul>\n";
    } else {
        echo "<p>No POST parameters received.</p>\n";
    }
}

// // Handle PUT, DELETE requests
// else {
//     $raw_input = file_get_contents('php://input');
//     echo "<p><b>Raw Input:</b> $raw_input</p>\n";
    
//     // Check if content type is JSON
//     if (strpos($content_type, 'application/json') !== false) {
//         echo "<p><b>Encoding:</b> application/json</p>\n";
//         $data = json_decode($raw_input, true);
//         if (json_last_error() !== JSON_ERROR_NONE) {
//             echo "<p style='color:red;'>JSON decode error: " . json_last_error_msg() . "</p>\n";
//         }
//     }
//     // Otherwise treat as form-urlencoded
//     else {
//         echo "<p><b>Encoding:</b> x-www-form-urlencoded</p>\n";
//         parse_str($raw_input, $data);
//     }
// }

// // Print parsed data
// echo "<h3>Parsed Parameters:</h3>\n";
// if (!empty($data)) {
//     echo "<ul>\n";
//     foreach ($data as $key => $value) {
//         if (is_array($value)) {
//             $value = json_encode($value);
//         }
//         echo "<li><b>$key:</b> $value</li>\n";
//     }
//     echo "</ul>\n";
// } else {
//     echo "<p>No parameters received.</p>\n";
// }

// Print HTML file bottom
echo "</body></html>";
?>