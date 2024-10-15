const activeFilters = document.querySelectorAll('.active_filter');
activeFilters.forEach(filter => {
    filter.addEventListener('click', (e) => {
        e.target.nextElementSibling.classList.toggle('active');
    });
})
