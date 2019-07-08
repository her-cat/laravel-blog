<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Request $request, Category $category, Article $article)
    {
        $articles = $article->withOrder($request->order)
            ->where('category_id', $category->id)
            ->paginate(12);

        return view('articles.index', compact('articles', 'category'));
    }
}
