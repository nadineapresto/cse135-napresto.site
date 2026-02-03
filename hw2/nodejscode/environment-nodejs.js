#!/usr/bin/node

// Print headers
console.log("Cache-Control: no-cache");
console.log("Content-Type: application/json");
console.log();

// Print HTML file top
console.log("<!DOCTYPE html>");
console.log("<html><head><title>Environment Variables</title>");
console.log("</head><body><h1 align=\"center\">Environment Variables</h1>");
console.log("<hr>");

// Loop through environment variables and print names and values
for (const [key, value] of Object.entries(process.env).sort()) {
    console.log(`<b>${key}:</b> ${value}<br />`);
}

// Print HTML file bottom
console.log("</body></html>");