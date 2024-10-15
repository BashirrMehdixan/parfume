<?php

namespace App\Http\Controllers\CategoriesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('pages.categories.index');
    }
}
