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

function boot() {
    renderMarkdownContent();
    initMarkdownEditors();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
} else {
    boot();
}
