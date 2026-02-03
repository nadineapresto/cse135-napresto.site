// Get form elements
const form = document.getElementById('echo-form');
const languageSelect = document.getElementById('language');
const methodSelect = document.getElementById('method');
const encodingSelect = document.getElementById('encoding');

// Update form action when language changes
languageSelect.addEventListener('change', function() {
    const lang = languageSelect.value;
    if (lang === 'php') {
        form.action = 'https://napresto.site/cgi-bin/echo-php.php';
    } else if (lang === 'python') {
        form.action = 'https://napresto.site/cgi-bin/echo-python.py';
    } else if (lang === 'nodejs') {
        form.action = 'https://napresto.site/cgi-bin/echo-nodejs.js';
    }
});

// Update form method when method changes
methodSelect.addEventListener('change', function() {
    const method = methodSelect.value;
    if (method === 'GET' || method === 'POST') {
        form.method = method;
    }
});

// Handle form submission for PUT, DELETE, and JSON
form.addEventListener('submit', function(event) {
    const method = methodSelect.value;
    const encoding = encodingSelect.value;

    // Only intercept if using PUT/DELETE or JSON
    if (method === 'PUT' || method === 'DELETE' || encoding === 'application/json') {
        event.preventDefault();
        
        // Get form data
        const formData = new FormData(form);
        const data = {};
        formData.forEach((value, key) => {
            if (key !== 'language' && key !== 'method' && key !== 'encoding') {
                data[key] = value;
            }
        });

        // Prepare body based on encoding
        let body;
        let contentType;
        if (encoding === 'application/json') {
            body = JSON.stringify(data);
            contentType = 'application/json';
        } else {
            body = new URLSearchParams(data).toString();
            contentType = 'application/x-www-form-urlencoded';
        }

        // Send request
        fetch(form.action, {
            method: method,
            headers: { 'Content-Type': contentType },
            body: body
        })
        .then(response => response.text())
        .then(html => {
            // Open response in new window
            const win = window.open();
            win.document.write(html);
        });
    }
    // Otherwise let form submit normally
});