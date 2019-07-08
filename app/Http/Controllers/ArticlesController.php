<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(12);

        return view('articles.index', compact('articles'));
    }
}
