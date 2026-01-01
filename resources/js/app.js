import './bootstrap';
import { marked } from 'marked';
import DOMPurify from 'dompurify';

function renderMarkdownContent() {
    const elements = document.querySelectorAll('.markdown-content[data-markdown]');

    elements.forEach((element) => {
        const source = element.dataset.markdown || '';

        if (!source.trim()) {
            return;
        }

        const html = marked.parse(source, { breaks: true });
        const clean = DOMPurify.sanitize(html);

        element.innerHTML = clean;
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', renderMarkdownContent);
} else {
    renderMarkdownContent();
}
