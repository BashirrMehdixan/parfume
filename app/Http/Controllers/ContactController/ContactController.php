<?php

namespace App\Http\Controllers\ContactController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $langs = [
            ['code' => 'az', 'url' => '/elaqe'],
            ['code' => 'en', 'url' => '/en/contact'],
            ['code' => 'ru', 'url' => '/ru/contact'],
        ];
        return view('pages.contact.index', compact('langs'));
    }
}
