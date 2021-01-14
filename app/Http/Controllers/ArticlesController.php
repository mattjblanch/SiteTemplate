<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    // Render a list of a resource

    public function index()
    {

        $article = Article::latest()->get();

        return view('articles.index', ['article' => $article]);

    }

    // Show a single resource
    public function show(Article $article) 
    {
        return view('articles.show', ['article' => $article]);
    }

    // Shows a view to create a new resource

    public function create()
    {
        return view('articles.create');
    }

    // Persist the new resource

    public function store()
    {
        // validation
        request()->validate([
            'title'=> 'required',
            'excerpt'=> 'required',
            'body'=> 'required'
        ]);

        // clean up
        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles');
    }

    // Show a view to edit an existing resource
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    //Persist the edited resource
    public function update(Article $article)
    {
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles/' . $article->id);
    }

    // Delete the resource

    public function destroy()
    {

    }
}
