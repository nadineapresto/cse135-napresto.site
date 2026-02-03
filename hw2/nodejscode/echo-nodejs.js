#!/usr/bin/node

const os = require('os');
const querystring = require('querystring');

// Get request info
const request_method = process.env.REQUEST_METHOD || 'Unknown';
const hostname = os.hostname();
const date_time = new Date().toString();
const user_agent = process.env.HTTP_USER_AGENT || 'Unknown';
const ip_address = process.env.REMOTE_ADDR || 'Unknown';

// Print headers
console.log("Cache-Control: no-cache");
console.log("Content-Type: text/html");
console.log();

// Print HTML file top
console.log("<!DOCTYPE html>");
console.log("<html><head><title>General Request Echo - Node.js</title>");
console.log("</head><body><h1 align=\"center\">General Request Echo - Node.js</h1>");
console.log("<hr>");

// Print request information
console.log("<h2>Request Information:</h2>");
console.log(`<p><b>HTTP Method:</b> ${request_method}</p>`);
console.log(`<p><b>Hostname:</b> ${hostname}</p>`);
console.log(`<p><b>Date/Time:</b> ${date_time}</p>`);
console.log(`<p><b>User Agent:</b> ${user_agent}</p>`);
console.log(`<p><b>IP Address:</b> ${ip_address}</p>`);

console.log("<h2>Received Data:</h2>");

// Handle GET request
if (request_method === "GET") {
    const query_string = process.env.QUERY_STRING || '';
    if (query_string) {
        const params = querystring.parse(query_string);
        console.log("<ul>");
        for (const [key, value] of Object.entries(params)) {
            console.log(`<li><b>${key}:</b> ${value}</li>`);
        }
        console.log("</ul>");
    } else {
        console.log("<p>No GET parameters received.</p>");
    }
}
// Handle POST request
else if (request_method === "POST") {
    const content_length = parseInt(process.env.CONTENT_LENGTH || '0');
    
    if (content_length > 0) {
        let post_data = '';
        
        process.stdin.on('data', chunk => {
            post_data += chunk;
        });
        
        process.stdin.on('end', () => {
            const params = querystring.parse(post_data);
            console.log("<ul>");
            for (const [key, value] of Object.entries(params)) {
                console.log(`<li><b>${key}:</b> ${value}</li>`);
            }
            console.log("</ul>");
            console.log("</body></html>");
        });
    } else {
        console.log("<p>No POST parameters received.</p>");
        console.log("</body></html>");
    }
} else {
    console.log("</body></html>");
}