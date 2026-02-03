#!/usr/bin/python3

import cgi
import cgitb
import http.cookies
import os
from datetime import datetime, timedelta

cgitb.enable()  # Enable debugging

# Get form data
form = cgi.FieldStorage()

# Check if form was submitted
if os.environ.get('REQUEST_METHOD') == 'POST':
    name = form.getvalue('name', '')
    color = form.getvalue('color', '')
    
    # Calculate expiry (1 hour from now)
    expiry = datetime.now() + timedelta(hours=1)
    expires = expiry.strftime("%a, %d %b %Y %H:%M:%S GMT")
    
    # Set cookies and redirect
    print("Content-Type: text/html")
    print(f"Set-Cookie: user_name={name}; Path=/; Expires={expires}")
    print(f"Set-Cookie: user_color={color}; Path=/; Expires={expires}")
    print("Location: https://napresto.site/cgi-bin/state-show-python.py")
    print()
else:
    # Display form
    print("Cache-Control: no-cache")
    print("Content-Type: text/html")
    print()
    
    print("<!DOCTYPE html>")
    print("<html>")
    print("<head><title>Python State - Set Data</title></head>")
    print("<body>")
    print("<h1>Python State Management - Set Data</h1>")
    print("<hr>")
    print('<form method="POST">')
    print('    <label for="name">Name:</label>')
    print('    <input type="text" id="name" name="name" required>')
    print('    <br><br>')
    print('    <label for="color">Favorite Color:</label>')
    print('    <input type="text" id="color" name="color" required>')
    print('    <br><br>')
    print('    <button type="submit">Save Data</button>')
    print("</form>")
    print("</body>")
    print("</html>")