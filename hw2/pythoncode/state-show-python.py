#!/usr/bin/python3

import os
import http.cookies

# Get cookies
cookie_string = os.environ.get('HTTP_COOKIE', '')
cookies = http.cookies.SimpleCookie()
cookies.load(cookie_string)

# Print headers
print("Cache-Control: no-cache")
print("Content-Type: text/html")
print()

# Print HTML file top
print("<!DOCTYPE html>")
print("<html>")
print("<head><title>Python State - Show Data</title></head>")
print("<body>")
print("<h1>Python State Management - Show Data</h1>")
print("<hr>")

# Check if cookies exist
if 'user_name' in cookies and 'user_color' in cookies:
    name = cookies['user_name'].value
    color = cookies['user_color'].value
    print(f"<p><b>Name:</b> {name}</p>")
    print(f"<p><b>Favorite Color:</b> {color}</p>")
else:
    print("<p>No data saved yet.</p>")

# Print HTML file bottom
print("<br>")
print('<a href="state-set-python.py">Set New Data</a> | ')
print('<a href="state-destroy-python.py">Clear Data</a>')
print("</body>")
print("</html>")