#!/usr/bin/node

const teamName = "Nadine Apresto";
const datetime = new Date().toString();
const ipAddress = process.env.REMOTE_ADDR || 'Unknown';

// Create response object
const response = {
    team: teamName,
    language: "Node.js",
    datetime: datetime,
    ip_address: ipAddress
};

// Print headers
console.log("Cache-Control: no-cache");
console.log("Content-Type: application/json");
console.log(); // Blank line required!

// Print JSON
console.log(JSON.stringify(response, null, 2));