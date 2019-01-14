<?php

namespace App\Http\Controllers;

use App\Entity\Comments;
use App\Entity\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipes::orderBy('difficulty','asc')->paginate(9);
        return view('recipes.index')->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info('create');

        return view('recipes.create');
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
                'name' => 'required|',
                'steps' => 'required',
                'ingredients' => 'required',
                'difficulty' => 'required',
                'preparation_time' => 'required',
                'cooking_time' => 'required',
                'materials' => 'required',
                'astuce' => 'required',

            ]
        );
        Log::info('ici');
        $recipe = new Recipes();

        $recipe->name=$request->input('name');
        $recipe->steps=$request->input('steps');
        $recipe->ingredients=$request->input('ingredients');
        $recipe->difficulty=$request->input('difficulty');
        $recipe->preparation_time=$request->input('preparation_time');
        $recipe->cooking_time=$request->input('cooking_time');
        $recipe->materials=$request->input('materials');
        $recipe->astuce=$request->input('astuce');
        $recipe->save();

        return redirect() -> route('recettes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entity\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipes::find($id);
        return view('recipes.show')->with('recipe',$recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipes $recipes, $id)
    {
        $recipe = Recipes::find($id);
        return view('recipes.edit')->with('recipe',$recipe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipes $recipes, $id)
    {
        Log::info('update ');

        $this->validate(
            $request,
            [
                'name' => 'required|',
                'steps' => 'required',
                'ingredients' => 'required',
                'difficulty' => 'required',
                'preparation_time' => 'required',
                'cooking_time' => 'required',
                'materials' => 'required',
                'astuce' => 'required',
            ]
        );
        Log::info('ici');
        $recipe = Recipes::find($id);

        $recipe->name=$request->input('name');
        $recipe->steps=$request->input('steps');
        $recipe->steps=$request->input('ingredients');
        $recipe->steps=$request->input('difficulty');
        $recipe->steps=$request->input('preparation_time');
        $recipe->steps=$request->input('cooking_time');
        $recipe->steps=$request->input('materials');
        $recipe->steps=$request->input('astuce');
        $recipe->save();

        return redirect() -> route('recettes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\Recipes  $recipes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipes::find($id);
        Recipes::destroy($recipe->id);
        return redirect() -> route('recettes.index');
    }

    public function ajoutCommentaire(Request $request){
        Log::info('update ');

        $this->validate(
            $request,
            [
                'content' => 'required|',
                'recipe_id' => 'required',
            ]
        );
        Log::info('ici');
        $comment = new Comments();

        $comment->content=$request->input('content');
        $comment->recipe_id=$request->input('recipe_id');
        $comment->user_id=Auth::user()->id;
        $comment->save();

        return redirect() -> route('recettes.show',['id'=>$request->input('recipe_id')]);
    }

    public function modifierCommentaire($id){
        $commentaire=Comments::find($id);
        return view('recipes.editComment',['comment'=>$commentaire]);
    }

    public function updateCommentaire(Request $request, $id){
        Log::info('update ');
        $comment=Comments::find($id);

        $this->validate(
            $request,
            [
                'content' => 'required|',
            ]
        );
        Log::info('ici');

        $comment->content=$request->input('content');
        $comment->save();

        return redirect() -> route('recettes.show',['id'=>$comment->recipe_id]);
    }

    public function supprimerCommentaire(Request $request, $id){
        $comment = Comments::find($id);
        $recipe_id=$comment->recipe_id;
        Comments::destroy($comment->id);
        return redirect() -> route('recettes.show',['id'=>$recipe_id]);
    }

}
