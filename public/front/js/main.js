const bannerGlide = new Glide('.banner_glide', {
    type: 'carousel',
}).mount();

const BestGlide = new Glide('.best_selling', {
    type: 'carousel',
    startAt: 0,
    perView: 4,
}).mount();
