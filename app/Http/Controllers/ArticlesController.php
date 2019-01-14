<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Entity\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::orderBy('hitcount','desc')->paginate(9);
        return view('articles.index')->with('Article', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info('create');

        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        Log::info('store');

        $this->validate(
            $request,
            [
                'titre' => 'required|',
                'summary' => 'required',
                'contenu' => 'required',

            ]
        );
        Log::info('ici');
        $article = new Articles();

        $article->title=$request->input('titre');
        $article->summary=$request->input('summary');
        $article->content=$request->input('contenu');
        $article->hitcount=0;
        $article->save();

        return redirect() -> route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entity\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Articles::find($id);
        $article->hitcount=$article->hitcount+1;
        $article->save();
        return view('articles.show')->with('article',$article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $articles, $id)
    {
        $article = Articles::find($id);
        return view('articles.edit')->with('article',$article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $articles, $id)
    {
        Log::info('update ');

        $this->validate(
            $request,
            [
                'titre' => 'required|',
                'summary' => 'required',
                'contenu' => 'required',

            ]
        );
        Log::info('ici');
        $article = Articles::find($id);

        $article->title=$request->input('titre');
        $article->summary=$request->input('summary');
        $article->content=$request->input('contenu');
        $article->save();

        return redirect() -> route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Articles::find($id);
        Articles::destroy($article->id);
        return redirect() -> route('articles.index');
    }
}