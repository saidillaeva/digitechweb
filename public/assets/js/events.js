const burger = document.getElementById('burger');
const nav = document.getElementById('site-nav');

if (burger && nav) {
    burger.addEventListener('click', () => {
        const isOpen = burger.classList.toggle('is-open');
        nav.classList.toggle('nav--open', isOpen);
        burger.setAttribute('aria-expanded', isOpen);
    });
}
