<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@3.1.0/dist/cookieconsent.css">
<script type="module">
    import 'https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@3.1.0/dist/cookieconsent.umd.js';

    const siloSend = async (data) => {
        try {
            await fetch('<?= $apiEndpoint ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer <?= $authToken ?>'
                },
                body: JSON.stringify(data)
            });
        } catch (e) { console.error('Silo Error:', e); }
    };

    CookieConsent.run({
        ...<?= json_encode($config) ?>,
        onConsent: (d) => siloSend(d),
        onChange: (d) => siloSend(d)
    });
</script>
