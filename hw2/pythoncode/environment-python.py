#!/usr/bin/python3

import os

print("Cache-Control: no-cache")
print("Content-Type: text/html")
print()

print("<!DOCTYPE html>")
print("<html><head><title>Environment Variables</title>")
print("</head><body><h1 align=\"center\">Environment Variables</h1>")
print("<hr>")

# Loop through all environment variables and print names and values
for key, value in sorted(os.environ.items()):
    print(f"<b>{key}:</b> {value}<br />")

print("</body></html>")