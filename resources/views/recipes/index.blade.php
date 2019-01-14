@extends('layouts.app')

@section('content')

<div class="articles_create">
    <center class="titre_center"><h1>Recettes</h1></center>

    @auth
    @if(Auth::user()->admin==1)
    <div class="create_article">
    <a type="button" href="{{ route('articles.create') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Créer une recette</a>
    </div>
    @endif
    @endauth
    <hr />

    @if(count($recipes) > 0 )
    <div class="grid_article">
        @foreach($recipes as $recipe)
            <div class="article {{(count($recipes)%3 == 1 && $recipes[count($recipes)-1]->id==$recipe->id) ? 'onlyline' : ''}}">
                <div>
                <h3  class="titre_article"><a href="{{route('recettes.show', ['id'=>$recipe->id])}}">{{$recipe->name}}</a></h3>
                </div>
                
                <div class="img_container">
                    <img class="img_article" src="{{asset('images/Takoyaki-caroussel.jpg')}}">
                </div> 

                <div class = "date_article">
                <small>Ecrit le {{$recipe->created_at}}</small>
                </div>
            </div>
        @endforeach
    </div>
        {{$recipes->links()}}
    @else
        <p>Pas d'article trouvé</p>
    @endif
</div>
@endsection