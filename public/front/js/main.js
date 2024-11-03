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

const actionBtns = document.querySelectorAll('.btn_actions');
const countInput = document.querySelector('.count_control');
actionBtns.forEach(btn => {
    btn.addEventListener('click', e => {
        e.preventDefault();
        if (e.target.classList.contains('btn_increment')) {
            countInput.value = Number(countInput.value) + 1;
        } else if (e.target.classList.contains('btn_decrement') && countInput.value > 1) {
            countInput.value = Number(countInput.value) - 1;
        }
    })
})

const searchBtn = document.querySelector('.btn_search');
const modal = document.querySelector('.modal');
searchBtn.addEventListener('click', e => {
    modal.classList.toggle('show');
    document.body.style.overflow = 'hidden';
})
document.querySelector('.modal .modal_body').addEventListener('click', e => {
    if (e.target.classList.contains('modal_body')) {
        modal.classList.remove('show');
        document.body.style.overflow = 'auto';
    }
})
