@extends('layouts.app')
@section('content')

    @foreach('articles' as $r)
        <ul>
            <li>
                {{$r->title}}
            </li>
            <a href="{{config("app.url")}}/articles/{{$r->id}}">Venez ici</a>
        </ul>
    @endforeach
@endsection