#!/usr/bin/node

// Get data
const date_time = new Date().toString();
const ip_address = process.env.REMOTE_ADDR || 'Unknown';

// Print headers
console.log("Cache-Control: no-cache");
console.log("Content-Type: text/html");
console.log();

// Print HTML
console.log("<!DOCTYPE html>");
console.log("<html>");
console.log("<head>");
console.log("    <title>Hello, Node.js!</title>");
console.log("</head>");
console.log("<body>");
console.log("    <h1 align=\"center\">Hello Node.js World</h1><hr/>");
console.log("    <p>Hello World from Nadine Apresto!</p>");
console.log("    <p>This page was generated with the Node.js programming language</p>");
console.log("    <p>This program was generated at: " + date_time + "</p>");
console.log("    <p>Your current IP Address is: " + ip_address + "</p>");
console.log("</body>");
console.log("</html>");