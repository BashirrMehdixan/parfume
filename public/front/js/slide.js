const bannerSlide = document.querySelector('.banner_glide');
const bestSelling = document.querySelector('.best_selling');
if (bannerSlide) {
    new Glide('.banner_glide', {
        type: 'carousel',
    }).mount();
}
if (bestSelling) {
    new Glide('.best_selling', {
        type: 'carousel',
        startAt: 0,
        perView: 4,
        breakpoints: {
            610: {
                perView: 1
            },
            991: {
                perView: 2
            },
            992: {
                perView: 3
            },

        }
    }).mount();
}


const obj = {
    a: 1,
    b: function () {
        return this.a
    },
    c: () => {
        return this.a
    }
}
