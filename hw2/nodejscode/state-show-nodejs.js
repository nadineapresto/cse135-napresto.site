#!/usr/bin/node

// Get cookies
const cookieString = process.env.HTTP_COOKIE || '';
const cookies = {};

if (cookieString) {
    cookieString.split(';').forEach(cookie => {
        const [key, value] = cookie.trim().split('=');
        cookies[key] = value;
    });
}

// Print headers
console.log("Cache-Control: no-cache");
console.log("Content-Type: text/html");
console.log();

// Print HTML file top
console.log("<!DOCTYPE html>");
console.log("<html>");
console.log("<head><title>Node.js State - Show Data</title></head>");
console.log("<body>");
console.log("<h1>Node.js State Management - Show Data</h1>");
console.log("<hr>");

// Check if cookies exist
if (cookies.user_name && cookies.user_color) {
    console.log(`<p><b>Name:</b> ${cookies.user_name}</p>`);
    console.log(`<p><b>Favorite Color:</b> ${cookies.user_color}</p>`);
} else {
    console.log("<p>No data saved yet.</p>");
}

// Print HTML file bottom
console.log("<br>");
console.log('<a href="state-set-nodejs.js">Set New Data</a> | ');
console.log('<a href="state-destroy-nodejs.js">Clear Data</a>');
console.log("</body>");
console.log("</html>");