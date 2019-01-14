@extends('layouts.app')

@section('content')
    @guest
    <div class="recipe_guest">
    <b><a href="{{route("register")}}"><i class="fa fa-user" aria-hidden="true"></i>  Inscrivez vous</a></b> pour voir des recettes...
    <br>
    <br>
    <a href="{{route("login")}}">Déjà inscrit ?</a>
    </div>
    

    @endguest
    @auth
    <b><a href="{{route("recettes.index")}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Retour en arrière</a></b>
    <h1>{{$recipe->name}}</h1>
    <div>
        <h2>Etapes</h2>
        {{$recipe->steps}}
        <br>
        <h2>Ingrédients</h2>
        {{$recipe->ingredients}}
        <br>
        <h2>Difficulté</h2>
        {{$recipe->difficulty}}
        <br>
        <h2>Temps préparation</h2>
        {{$recipe->preparation_time}}
        <br>
        <h2>Temps cuisson</h2>
        {{$recipe->cooking_time}}
        <br>
        <h2>Matériaux</h2>
        {{$recipe->materials}}
        <br>
        <h2>L'astuce du chef !</h2>
        {{$recipe->astuce}}
    </div>
    <hr>
    <small>Ecrit le {{$recipe->created_at}}</small>
    <hr>

    @if(Auth::user()->admin==1)
    <a href="{{route('recettes.edit',['id'=>$recipe->id])}}">Edit</a>

    <form action="{{route('recettes.destroy',['id'=>$recipe->id])}}" method="post">
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <input type="submit" name="submit" value="Supprimer" class="btn btn-danger">
    </form>

    @endif
    <h3>Commentaires</h3>
    <ul>@foreach($recipe->comments as $comment)
            <li>{{$comment->content}}
                @if(Auth::user()->admin==1)
                <h5><a href="{{route('supprimerCommentaire',['id'=>$comment->id])}}" type="button">Supprimer</a>
                <a href="{{route('modifierCommentaire',['id'=>$comment->id])}}" type="button">Modifier</a></li></h5>
            @endif
    @endforeach</ul>

    <h4>Ajouter un commentaire</h4>
    <form action="{{route('ajoutCommentaire')}}" method="post">
        <input type="hidden" name="recipe_id" value="{{$recipe->id}}">
        <textarea placeholder="Votre commentaire" maxlength="100" name="content"></textarea>
        {!! csrf_field() !!}
        <button type="submit" name="submit" value="valide" class="btn btn-danger">Envoyer</button>
    </form>

    @endauth

@endsection
