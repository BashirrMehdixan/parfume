lucide.createIcons();
const activeFilters = document.querySelectorAll('.active_filter');
activeFilters.forEach(filter => {
    filter.addEventListener('click', (e) => {
        e.target.nextElementSibling.classList.toggle('active');
    });
})

const collectionItems = document.querySelectorAll('.collection_item');

collectionItems.forEach(collectionItem => {
    collectionItem.style.backgroundImage = `url(${collectionItem.dataset.bg})`;
})

const langBtn = document.querySelector('.active_lang')
langItems = document.querySelector('.lang_items');

langBtn.addEventListener('click', e => {
    langItems.classList.toggle('active');
})

const mobBtn = document.querySelector('.btn_mobile');
const mobileNav = document.querySelector('.nav-menu');
const overlay = document.querySelector('.overlay');
const btnClose = document.querySelector('header .btn_close');

mobBtn.addEventListener('click', (e) => {
    mobileNav.classList.toggle('active');
    overlay.classList.toggle('active');
    document.body.classList.toggle('scrolling');
})
overlay.addEventListener('click', () => {
    mobileNav.classList.remove('active');
    overlay.classList.remove('active');
    document.body.classList.remove('scrolling');

})

btnClose.addEventListener('click', () => {
    mobileNav.classList.remove('active');
    overlay.classList.remove('active');
    document.body.classList.remove('scrolling');
})

