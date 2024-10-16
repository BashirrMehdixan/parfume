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
