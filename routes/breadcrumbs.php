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
    $trail->push(__('brands'), route('brands_' . session('locale')));

});
// Home > Brands > [Brand]
Breadcrumbs::for('brand', function (BreadcrumbTrail $trail, $brand) {
    $trail->parent('brands');
    $trail->push($brand->name, route('brands_show_' . session('locale'), $brand));

});
// Home > Perfumes
Breadcrumbs::for('products', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('index');
    $trail->push($category->name, route('products_category_' . session('locale'), $category));
});

// Home > Perfumes > [Perfume]
Breadcrumbs::for('product', function (BreadcrumbTrail $trail, $product, $category) {
    $trail->parent('products');
    $trail->push($product->name, route('products_show'.session('locale'), $product, $category));
});

//// Home > Watches
//Breadcrumbs::for('watches', function (BreadcrumbTrail $trail) {
//    $trail->parent('index');
//    $trail->push(__('watches'), route('products.index'));
//});
//
//// Home > Watches > [Watch]
//Breadcrumbs::for('watch', function (BreadcrumbTrail $trail, $watch) {
//    $trail->parent('watches');
//    $trail->push($watch->name, route('watches.show', $watch));
//});

