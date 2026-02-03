#!/usr/bin/python3

# Clear cookies by setting expiry to the past
print("Content-Type: text/html")
print("Set-Cookie: user_name=; Path=/; Expires=Thu, 01 Jan 1970 00:00:00 GMT")
print("Set-Cookie: user_color=; Path=/; Expires=Thu, 01 Jan 1970 00:00:00 GMT")
print()

print("<!DOCTYPE html>")
print("<html>")
print("<head><title>Python State - Clear Data</title></head>")
print("<body>")
print("<h1>Python State Management - Data Cleared</h1>")
print("<hr>")
print("<p>Your data has been cleared.</p>")
print("<br>")
print('<a href="state-set-python.py">Set New Data</a> | ')
print('<a href="state-show-python.py">View Data</a>')
print("</body>")
print("</html>")