<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show() {
        return view('categories', [
            'title' => 'Categories',
            'post' => 
        ]);
    }
}
