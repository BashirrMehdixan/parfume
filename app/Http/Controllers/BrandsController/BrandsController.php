<?php

namespace App\Http\Controllers\BrandsController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        return view('pages.brands.index');
    }
}
