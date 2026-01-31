### Widok `Views/template.php`
Hermetyczny kod HTML/JS wstrzykiwany przez Orchestratora.

```html
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@3.1.0/dist/cookieconsent.css">
<script type="module">
    import 'https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@3.1.0/dist/cookieconsent.umd.js';

    const silo_dispatch = async (data) => {
        try {
            await fetch('<?= $apiEndpoint ?>', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });
        } catch (e) { console.error('Silo Gateway Error', e); }
    };

    CookieConsent.run({
        ...<?= json_encode($config) ?>,
        onConsent: (d) => silo_dispatch(d),
        onChange: (d) => silo_dispatch(d)
    });
</script>
