<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $articles = Article::where('category_id', $category->id)->paginate(12);

        return view('articles.index', compact('articles', 'category'));
    }
}
