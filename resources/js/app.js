import './bootstrap';
import { marked } from 'marked';
import DOMPurify from 'dompurify';

function renderMarkdownContent() {
    const elements = document.querySelectorAll('.markdown-content');

    elements.forEach((element) => {
        const source = element.textContent || '';

        if (!source.trim()) {
            return;
        }

        const html = marked.parse(source, { breaks: true });
        const clean = DOMPurify.sanitize(html);

        element.innerHTML = clean;
    });
}

function applyMarkdownFormat(textarea, action) {
    const value = textarea.value;
    const start = textarea.selectionStart ?? 0;
    const end = textarea.selectionEnd ?? 0;
    const selected = value.slice(start, end);

    let before = value.slice(0, start);
    let after = value.slice(end);
    let replacement = selected;

    if (action === 'bold') {
        replacement = `**${selected || 'bold text'}**`;
    }

    if (action === 'italic') {
        replacement = `_${selected || 'italic text'}_`;
    }

    if (action === 'heading') {
        const lines = (selected || 'Heading').split('\n');
        replacement = lines.map((line) => (line.startsWith('#') ? line : `# ${line}`)).join('\n');
    }

    if (action === 'list') {
        const text = selected || 'List item';
        const lines = text.split('\n');
        replacement = lines.map((line) => (line.startsWith('- ') ? line : `- ${line || 'Item'}`)).join('\n');
    }

    if (action === 'link') {
        const label = selected || 'link text';
        replacement = `[${label}](https://example.com)`;
    }

    const nextValue = before + replacement + after;
    textarea.value = nextValue;

    const newCursor = before.length + replacement.length;
    textarea.setSelectionRange(newCursor, newCursor);
}

function renderMarkdownPreview(textarea, preview) {
    const source = textarea.value || '';
    const html = marked.parse(source, { breaks: true });
    const clean = DOMPurify.sanitize(html);
    preview.innerHTML = clean;
}

function initMarkdownEditors() {
    const editors = document.querySelectorAll('.markdown-editor');

    editors.forEach((editor) => {
        const textarea = editor.querySelector('.markdown-editor-input');
        const preview = editor.querySelector('.markdown-editor-preview');

        if (!textarea || !preview) {
            return;
        }

        const update = () => renderMarkdownPreview(textarea, preview);

        textarea.addEventListener('input', update);
        update();

        editor.addEventListener('click', (event) => {
            const button = event.target.closest('button[data-md-action]');

            if (!button) {
                return;
            }

            event.preventDefault();
            const action = button.dataset.mdAction;

            if (!action) {
                return;
            }

            applyMarkdownFormat(textarea, action);
            update();
            textarea.focus();
        });
    });
}

function initCookieBanner() {
    const banner = document.querySelector('[data-cookie-banner]');

    if (!banner) {
        return;
    }

    if (banner.dataset.cookieReady === 'true') {
        return;
    }

    banner.dataset.cookieReady = 'true';

    const stored = window.localStorage.getItem('foodfusion_cookie_consent');

    if (stored === 'accepted' || stored === 'rejected') {
        banner.classList.add('hidden');
        return;
    }

    const close = () => {
        banner.classList.add('hidden');
    };

    const acceptButton = banner.querySelector('[data-cookie-accept]');
    const rejectButton = banner.querySelector('[data-cookie-reject]');
    

    const sendConsent = (accepted) => {
        window.localStorage.setItem('foodfusion_cookie_consent', accepted ? 'accepted' : 'rejected');

        const isAuth = window.foodfusionUserIsAuthenticated === true
            || window.foodfusionUserIsAuthenticated === 'true';

        if (!isAuth) {
            return;
        }

        fetch('/cookie-consent', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ accepted }),
        }).catch(() => {});
    };

    acceptButton?.addEventListener('click', () => {
        sendConsent(true);
        close();
    });

    rejectButton?.addEventListener('click', () => {
        sendConsent(false);
        close();
    });
}

function boot() {
    console.log('boot');
    renderMarkdownContent();
    initMarkdownEditors();
    initCookieBanner();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
} else {
    boot();
}
