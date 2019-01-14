@extends('layouts.app')

@section('content')



    <b><a href="{{route("articles.index")}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Retour en arrière</a></b>
    <br>
    <br>
    <center><h1 class="titre_article_content">{{$article->title}}</h1></center>
    <br>
    <br>
    <div>
        <i>{{$article->summary}}</i>
        <br>
        <br>
        <center><img src="{{asset('images/pizza.jpg')}}"></center>
        <br>
        <br>
        {{$article->content}}
        <br>
        <br>
    </div>
    <hr>
    <small>Ecrit le {{$article->created_at}}</small>
    <br>
    <small>Cet article à été vu {{$article->hitcount}} fois</small>
    <hr>

    @auth
    @if(Auth::user()->admin==1)

    <a href="{{route('articles.edit',['id'=>$article->id])}}">Editer</a>
    <form action="{{route('articles.destroy',['id'=>$article->id])}}" method="post">
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <input type="submit" name="submit" value="Supprimer" class="btn btn-danger">
    </form>

    @endif
    @endauth

@endsection
