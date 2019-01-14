@extends('layouts.app')

@section('content')
    <div>
        <center class="titre_center"><h1>Articles</h1></center>

        @auth
        @if(Auth::user()->admin==1)

        <div class="create_article">
            <a type="button" href="{{ route('articles.create') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Créer un article</a>     
            <div>

                @endif
                @endauth
                <hr />
            @if(count($Article) > 0 )
        <div class="grid_article"> 
            
                @foreach($Article as $article)
                    <div class="article {{(count($Article)%3 == 1 && $Article[count($Article)-1]->id==$article->id) ? 'onlyline' : ''}}">
                        <div>
                            <h3 class="titre_article"><a href="{{route('articles.show', ['id'=>$article->id])}}">{{$article->title}}</a></h3>
                        </div>   
                    
                        <div class="img_container">
                            <img class="img_article" src="{{asset('images/KFCjapon_Carrou.png')}}">
                        </div> 
                        

                        <div class = "date_article">
                            <small>Ecrit le {{$article->created_at}}</small><br>
                            <small>Article vu {{$article->hitcount}} fois</small>
                        </div>                   
                    </div>
                @endforeach
                </div>
                {{$Article->links()}}
            @else

            
                <p>Pas d'articles trouvés</p>
            @endif
         
    </div>

    

@endsection
