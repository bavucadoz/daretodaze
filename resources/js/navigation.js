// Menu mobile: tombol buka/tutup, tutup dengan Escape, dan tutup saat tautan dipilih.
const toggle = document.querySelector('[data-nav-toggle]');
const nav = document.querySelector('[data-nav]');

if (toggle && nav) {
    const isOpen = () => toggle.getAttribute('aria-expanded') === 'true';

    const setOpen = (open) => {
        toggle.setAttribute('aria-expanded', String(open));
        nav.toggleAttribute('data-open', open);
    };

    toggle.addEventListener('click', () => setOpen(!isOpen()));

    nav.addEventListener('click', (event) => {
        if (event.target.closest('a')) setOpen(false);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && isOpen()) {
            setOpen(false);
            toggle.focus();
        }
    });

    // Jika jendela diperlebar ke ukuran desktop, reset status menu
    window.matchMedia('(min-width: 768px)').addEventListener('change', (event) => {
        if (event.matches) setOpen(false);
    });
}