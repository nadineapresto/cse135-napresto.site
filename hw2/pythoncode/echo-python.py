#!/usr/bin/python3

import os
import sys
import urllib.parse
from datetime import datetime

# Print headers
print("Cache-Control: no-cache")
print("Content-Type: text/html")
print()

# Get request info
request_method = os.environ.get('REQUEST_METHOD', 'Unknown')
hostname = os.uname().nodename
date_time = datetime.now().strftime("%a %b %e %H:%M:%S %Y")
user_agent = os.environ.get('HTTP_USER_AGENT', 'Unknown')
ip_address = os.environ.get('REMOTE_ADDR', 'Unknown')

# Print HTML file top
print("<!DOCTYPE html>")
print("<html><head><title>General Request Echo - Python</title>")
print("</head><body><h1 align=\"center\">General Request Echo - Python</h1>")
print("<hr>")

# Print request information
print("<h2>Request Information:</h2>")
print("<p><b>Language:</b> Python</p>")
print(f"<p><b>HTTP Method:</b> {request_method}</p>")
print("<p><b>Encoding:</b> x-www-form-urlencoded</p>")
print(f"<p><b>Hostname:</b> {hostname}</p>")
print(f"<p><b>Date/Time:</b> {date_time}</p>")
print(f"<p><b>User Agent:</b> {user_agent}</p>")
print(f"<p><b>IP Address:</b> {ip_address}</p>")

print("<h2>Received Data:</h2>")

# Handle GET request
if request_method == "GET":
    query_string = os.environ.get('QUERY_STRING', '')
    if query_string:
        params = urllib.parse.parse_qs(query_string)
        print("<ul>")
        for key, values in params.items():
            for value in values:
                print(f"<li><b>{key}:</b> {value}</li>")
        print("</ul>")
    else:
        print("<p>No GET parameters received.</p>")

# Handle POST request
elif request_method == "POST":
    content_length = int(os.environ.get('CONTENT_LENGTH', 0))
    if content_length > 0:
        post_data = sys.stdin.read(content_length)
        params = urllib.parse.parse_qs(post_data)
        print("<ul>")
        for key, values in params.items():
            for value in values:
                print(f"<li><b>{key}:</b> {value}</li>")
        print("</ul>")
    else:
        print("<p>No POST parameters received.</p>")

# Print HTML file bottom
print("</body></html>")