<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request, Article $article)
    {
        $articles = $article->withOrder($request->order)->paginate(12);

        return view('articles.index', compact('articles'));
    }

    public function create(Article $article)
    {
        $categories = Category::all();

        return view('articles.create_and_edit', compact('article', 'categories'));
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = Auth::id();
        $article->save();

        return redirect()->route('articles.show', $article->id)->with('success', '发布成功');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('articles.create_and_edit', compact('article', 'categories'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->save();

        return redirect()->route('articles.show', $article->id)->with('success', '编辑成功');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        $data = [
            'success' => false,
            'msg' => '上传失败!',
            'file_path' => '',
        ];

        if ($file = $request->upload_file) {
            $url = $uploader->save($file, 'articles', Auth::id(), 1024);
            if ($url) {
                $data['success'] = true;
                $data['msg'] = '上传成功';
                $data['file_path'] = $url;
            }
        }

        return $data;
    }
}
