@extends('layouts.error')

@section('content')
<div>
    <b><a href="{{ url('/') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Retour vers l'accueil </a></b>
	<img src="{{asset('images/Error404.png')}}"  alt="Yummy 404" class="img404">
    
    
    
</div>

@endsection
