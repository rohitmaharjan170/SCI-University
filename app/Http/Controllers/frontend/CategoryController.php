<?php

namespace App\Http\Controllers\frontend;

use App\models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $data['category'] = $category;
        $data['lang'] = lang();

        return view('frontend.category.index', $data);
    }
}
