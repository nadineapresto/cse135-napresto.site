<?php
// GitHub Webhook Handler

// Secret key for security
$secret = 'barnes_n_noble_2026';

// Get the payload
$payload = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';

// Verify signature
if ($signature) {
    $hash = 'sha256=' . hash_hmac('sha256', $payload, $secret);
    if (!hash_equals($hash, $signature)) {
        http_response_code(403);
        die('Invalid signature');
    }
}

// Log the deployment
file_put_contents('/tmp/github-webhook.log', date('Y-m-d H:i:s') . " - Webhook received\n", FILE_APPEND);

// Execute deployment script
$output = shell_exec('sudo /var/www/deploy.sh 2>&1');

// Log output
file_put_contents('/tmp/github-webhook.log', $output . "\n", FILE_APPEND);

http_response_code(200);
echo "Deployment triggered successfully";
?>
