# CSE 135 - HW1 Submission

## Team Members:
- Nadine Apresto (solo)

## Apache Server Access Information

### Grader Account
- **Username:** REDACTED (see Gradescope submission for READMEwKeys.md)
- **Password:** REDACTED (see Gradescope submission for READMEwKeys.md)
- **Server IP:** REDACTED (see Gradescope submission for READMEwKeys.md)

### Website Login (Password Protected)
- **Main Site URL:** https://napresto.site
- **Username:** REDACTED (see Gradescope submission for READMEwKeys.md)
- **Password:** REDACTED (see Gradescope submission for READMEwKeys.md)

### MySQL Root Account
- **Username:** REDACTED (see Gradescope submission for READMEwKeys.md)
- **Password:** REDACTED (see Gradescope submission for READMEwKeys.md)

## Website Links

**Main Site:** https://napresto.site

**Sub Pages:**
- Homepage: https://napresto.site/
- Nadine Apresto About page: https://napresto.site/nadineapresto.html
- PHP Test: https://napresto.site/hw1/hello.php
- Analytics Report: https://napresto.site/hw1/report.html

**Subdomains:**
- Collector: https://collector.napresto.site
- Reporting: https://reporting.napresto.site

## GitHub Auto-Deploy Setup

**Repository (Public):** https://github.com/nadineapresto/cse135-napresto.site

**Automatic Deployment Process I Survived:**
1. Installed and configured SSH keys on the server
2. Created deploy key in GitHub (w/ read-only access)
3. Created deployment script at `/var/www/deploy.sh` that pulls from GitHub
4. Created webhook handler at `/var/www/napresto.site/public_html/webhook.php`
5. Configured GitHub webhook to POST to `https://napresto.site/webhook.php`
6. Set up sudo permissions for www-data to run deployment script
7. When code is pushed to main branch, GitHub triggers webhook, which executes deploy script, pulling latest changes

**Webhook Secret Password:** REDACTED (see Gradescope submission for READMEwKeys.md)

## Compression Configuration

After enabling `mod_deflate`, the HTML file now shows `Content-Encoding: gzip` in the Response Headers in Chrome DevTools (see compression-verify.jpg). This means the server compresses the HTML before sending it to the browse which reduces the file size. The browser automatically decompresses it for the user when they visit the website and send a request to get the HTML files.

## Server Header Obfuscation

The steps it ultimately took for me to change the Server header to "CSE135 Server" in the Chrome DevTools:

1. Installed mod_security2: `sudo apt install libapache2-mod-security2`
2. Copied recommended config from `modsecurity.conf-recommended` file to `modsecurity.conf`: `sudo cp /etc/modsecurity/modsecurity.conf-recommended /etc/modsecurity/modsecurity.conf`
3. Edited `/etc/modsecurity/modsecurity.conf`:
   - Set `SecRuleEngine On`
   - Set `SecServerSignature "CSE135 Server"`
4. Changed `/etc/apache2/apache2.conf`:
   - Set `ServerTokens Full` (setting it to `Prod` did not work)
   - Set `ServerSignature Off`
5. Restarted Apache
