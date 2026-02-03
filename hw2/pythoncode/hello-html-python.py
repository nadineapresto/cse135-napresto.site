#!/usr/bin/python3

import datetime
import os

print("Cache-Control: no-cache")
print("Content-Type: text/html")

# Get user data to print
date_time = datetime.datetime.now().strftime("%a %b %e %H:%M:%S %Y")
ip_address = os.environ.get('REMOTE_ADDR', 'Unknown')

print("<!DOCTYPE html>")
print("<html>")
print("<head>")
print("    <title>Hello, Python!</title>")
print("</head>")
print("<body>")
print("    <h1 align=\"center\">Hello Python World</h1><hr/>")
print("    <p>Hello World from Nadine Apresto!</p>")
print("    <p>This page was generated with the Python programming langauge</p>")
print(f"    <p>This program was generated at: {date_time}</p>")
print(f"    <p>Your current IP Address is: {ip_address}</p>")
print("</body>")
print("</html>")