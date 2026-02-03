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
    form.method = methodSelect.value;
});