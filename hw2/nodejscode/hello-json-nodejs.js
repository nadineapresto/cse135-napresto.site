#!/usr/bin/node

// Get data
const date_time = new Date().toString();
const ip_address = process.env.REMOTE_ADDR || 'Unknown';

// Print headers
console.log("Cache-Control: no-cache");
console.log("Content-Type: application/json");
console.log();

// Build JSON message
const message = {
    "title": "Hello, Node!",
    "message": "This response was generated with Node.js",
    "time": date_time,
    "ip_address": ip_address
}

// Print JSON message
console.log(JSON.stringify(response));