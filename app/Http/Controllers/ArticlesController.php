<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(Request $request, Article $article)
    {
        $articles = $article->withOrder($request->order)->paginate(12);

        return view('articles.index', compact('articles'));
    }
}
