document.addEventListener('DOMContentLoaded', () => {
    const pushEvent = (event, parameters = {}) => {
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({ event, ...parameters });
    };

    const consentBanner = document.querySelector('#consentBanner');
    const setConsent = (status) => {
        localStorage.setItem('google_consent', status);
        if (typeof window.gtag === 'function') {
            window.gtag('consent', 'update', { analytics_storage: status });
        }
        if (consentBanner) consentBanner.hidden = true;
        pushEvent('consent_update', { analytics_storage: status });
    };

    if (consentBanner && !localStorage.getItem('google_consent')) consentBanner.hidden = false;
    document.querySelector('#acceptAnalytics')?.addEventListener('click', () => setConsent('granted'));
    document.querySelector('#rejectAnalytics')?.addEventListener('click', () => setConsent('denied'));

    document.addEventListener('click', (event) => {
        const link = event.target.closest('a[href]');
        if (!link || !link.href.includes('contact.php')) return;
        pushEvent('admission_cta_click', {
            link_text: link.textContent.trim().slice(0, 80),
            page_path: window.location.pathname
        });
    });

    document.querySelectorAll('form[action*="colleges.php"]').forEach((form) => {
        form.addEventListener('submit', () => pushEvent('college_search', {
            search_location: form.querySelector('[name="q"]')?.value ? 'query_entered' : 'browse_all'
        }));
    });

    const button = document.querySelector('#compareButton');
    if (!button) return;
    button.addEventListener('click', () => {
        const a = document.querySelector('#collegeA').value;
        const b = document.querySelector('#collegeB').value;
        const message = document.querySelector('#compareMessage');
        if (!a || !b || a === b) {
            message.textContent = 'Please select two different colleges.';
            return;
        }
        message.textContent = '';
        pushEvent('compare_colleges', { college_a: a, college_b: b });
        window.open('/college.php?slug=' + encodeURIComponent(a), 'collegeA');
        window.open('/college.php?slug=' + encodeURIComponent(b), 'collegeB');
    });
});
