#!/usr/bin/node

// Clear cookies by setting expiry to the past
console.log("Content-Type: text/html");
console.log("Set-Cookie: user_name=; Path=/; Expires=Thu, 01 Jan 1970 00:00:00 GMT");
console.log("Set-Cookie: user_color=; Path=/; Expires=Thu, 01 Jan 1970 00:00:00 GMT");
console.log();

console.log("<!DOCTYPE html>");
console.log("<html>");
console.log("<head><title>Node.js State - Clear Data</title></head>");
console.log("<body>");
console.log("<h1>Node.js State Management - Data Cleared</h1>");
console.log("<hr>");
console.log("<p>Your data has been cleared.</p>");
console.log("<br>");
console.log('<a href="state-set-nodejs.js">Set New Data</a> | ');
console.log('<a href="state-show-nodejs.js">View Data</a>');
console.log("</body>");
console.log("</html>");