#!/usr/bin/node

const querystring = require('querystring');

const requestMethod = process.env.REQUEST_METHOD;

// Check if form was submitted
if (requestMethod === 'POST') {
    const contentLength = parseInt(process.env.CONTENT_LENGTH || '0');
    let postData = '';
    
    process.stdin.on('data', chunk => {
        postData += chunk;
    });
    
    process.stdin.on('end', () => {
        const params = querystring.parse(postData);
        const name = params.name || '';
        const color = params.color || '';
        
        // Calculate expiry (1 hour from now)
        const expiry = new Date(Date.now() + 3600000);
        const expires = expiry.toUTCString();
        
        // Set cookies and redirect
        console.log("Content-Type: text/html");
        console.log(`Set-Cookie: user_name=${name}; Path=/; Expires=${expires}`);
        console.log(`Set-Cookie: user_color=${color}; Path=/; Expires=${expires}`);
        console.log("Location: https://napresto.site/cgi-bin/state-show-nodejs.js");
        console.log();
    });
} else {
    // Print form
    console.log("Cache-Control: no-cache");
    console.log("Content-Type: text/html");
    console.log();
    
    console.log("<!DOCTYPE html>");
    console.log("<html>");
    console.log("<head><title>Node.js State - Set Data</title></head>");
    console.log("<body>");
    console.log("<h1>Node.js State Management - Set Data</h1>");
    console.log("<hr>");
    console.log('<form method="POST">');
    console.log('    <label for="name">Name:</label>');
    console.log('    <input type="text" id="name" name="name" required>');
    console.log('    <br><br>');
    console.log('    <label for="color">Favorite Color:</label>');
    console.log('    <input type="text" id="color" name="color" required>');
    console.log('    <br><br>');
    console.log('    <button type="submit">Save Data</button>');
    console.log("</form>");
    console.log("</body>");
    console.log("</html>");
}