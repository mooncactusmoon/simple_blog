<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $articles = Article::with(relations:'user')->orderBy('id', 'desc')->paginate(4);
        return view('articles.index', ['articles' => $articles]);
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10'
        ]);

        auth()->user()->articles()->create($data);
        return redirect()->route('root')->with('notice', '文章新增成功');
    }

    public function edit($id)
    {
        $article = auth()->user()->articles->find($id);
        if (!$article) {
            return view('articles.authError');
        }
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $article = auth()->user()->articles->find($id);
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required|min:10'
        ]);

        $article->update($data);
        return redirect()->route('root')->with('notice', '文章更新成功 : ' . $request->title);
    }

    public function destroy($id)
    {
        $article = auth()->user()->articles->find($id);
        if (!$article) {
            return view('articles.authError');
        }
        $article->delete();
        return redirect()->route('root')->with('notice', '文章已刪除');
    }
}
