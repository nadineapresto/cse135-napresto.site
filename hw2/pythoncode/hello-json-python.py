#!/usr/bin/python3

import datetime
import os
import json

print("Cache-Control: no-cache")
print("Content-Type: application/json")
print()

# Get user data to print
date_time = datetime.datetime.now().strftime("%a %b %e %H:%M:%S %Y")
ip_address = os.environ.get('REMOTE_ADDR', 'Unknown')

# Build JSON message
message = {
    "language": "Python",
    "datetime": date_time,
    "ip_address": ip_address
}

# Output JSON message
print(json.dumps(message, indent = 2))