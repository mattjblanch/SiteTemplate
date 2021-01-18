<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    // Render a list of a resource

    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', ['articles' => $articles]);



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
        Article::create($this->validateArticle());

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
        $article->update($this->validateArticle());

        return redirect('/articles/' . $article->id);
    }

    // Delete the resource

    public function destroy()
    {

    }


    protected function validateArticle()
    {
        return request()->validate([
            'title'=> 'required',
            'excerpt'=> 'required',
            'body'=> 'required'
        ]);
    }
}