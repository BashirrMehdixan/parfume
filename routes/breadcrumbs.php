<?php

use App\Models\Product;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push(__('home'), route('index'));
});
// Home > Brands
Breadcrumbs::for('brands', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(__('brands'), route('brands.index'));

});
// Home > Perfumes
Breadcrumbs::for('products', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(__('perfumes'), route('products.index'));
});

// Home > Perfumes > [Perfume]
Breadcrumbs::for('product', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('products');
    $trail->push($product->name, route('products.show', $product));
});

// Home > Watches
Breadcrumbs::for('watches', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(__('watches'), route('products.index'));
});

// Home > Watches > [Watch]
Breadcrumbs::for('watch', function (BreadcrumbTrail $trail, $watch) {
    $trail->parent('watches');
    $trail->push($watch->name, route('watches.show', $watch));
});

