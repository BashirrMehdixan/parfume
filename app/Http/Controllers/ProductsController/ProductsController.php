<?php

namespace App\Http\Controllers\ProductsController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    protected function getCategory($category): array
    {
        return $langs = [
            ['code' => 'az', 'url' => '/mehsullar/' . $category->getTranslation('slug', 'az')],
            ['code' => 'en', 'url' => '/en/products/' . $category->getTranslation('slug', 'en')],
            ['code' => 'ru', 'url' => '/ru/produkty/' . $category->getTranslation('slug', 'ru')],
        ];

    }

    protected function applySorting($query, $sortBy)
    {
        switch ($sortBy) {
            case 'old':
                $query->orderBy('created_at', 'asc');
                break;
            case 'alph_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'alph_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'low_order':
                $query->orderBy('price', 'asc');
                break;
            case 'high_order':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        return $query;
    }

    public function index(Request $request, $slug)
    {
        $category = Collection::where('slug->' . session('locale'), $slug)->first();
        $query = $category->products()->where('status', 1);
        $this->applySorting($query, $request->input('sortBy'));
        $products = $query->paginate(12);
        $brands = Brand::where('status', 1)->get();
        return view('pages.products.index', compact('products', 'brands', 'category'), [
            'langs' => $this->getCategory($category),
        ]);
    }

    public function show($category, $slug)
    {
        $category = Collection::where('slug->' . session('locale'), $category)->first();
        $products = Product::where('status', 1)->get();
        $product = Product::where('slug->' . session('locale'), $slug)->first();
        return view('pages.products.show', compact('product', 'products', 'category'), [
            'langs' => $this->getCategory($category),
        ]);
    }

    public function filter(Request $request, $category)
    {
        $category = Collection::where('slug->' . session('locale'), $category)->first();

        $query = Product::query()->where('status', 1)->where('collection_id', $category->id);
        if ($request->gender && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        if ($request->brand && $request->brand !== 'all') {
            $query->where('brand_id', $request->brand);
        }

        $products = $query->paginate(12);

        return view('pages.products.index', compact('products', 'category'), [
            'langs' => $this->getCategory($category),
        ]);
    }
}
