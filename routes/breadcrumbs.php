<?php

use App\Models\Product;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('index'));
});
// Home > Brands
Breadcrumbs::for('brands', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Brands', route('brands.index'));

});
// Home > Products
Breadcrumbs::for('products', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Products', route('products.index'));
});

// Home > Products > [Product]
Breadcrumbs::for('product', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('products');
    $trail->push($product->name, route('products.show', $product));
});

