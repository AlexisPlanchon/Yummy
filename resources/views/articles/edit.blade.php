@extends('layouts.app')

@section('content')
    <h3>Article - Edition</h3>




    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{route('articles.update',[$article->id])}}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {!! method_field('put') !!}

        <textarea class="form-control textarea-limited" name="titre" placeholder="Nouveau titre" rows="1" , maxlength="100">{{$article->title}}</textarea><br>
        <textarea class="form-control textarea-limited" name="summary" placeholder="Nouveau sommaire" rows="6" , maxlength="1000">{{$article->summary}}</textarea><br>
        <textarea class="form-control textarea-limited" name="contenu" placeholder="Nouveau contenu" rows="13" , maxlength="1000">{{$article->content}}</textarea>


        <h3>Ajout Image ou vidéo</h3>

        <div class="fileinput-preview fileinput-exists thumbnail img-no-padding" style="max-width: 370px; max-height: 250px;"></div>
        <div>
        <span class="btn btn-outline-default btn-round btn-file">
        <span class="fileinput-new">Choisir un fichier</span>

        <input  type="file" name="media"></span>
            <a href="" class="btn btn-link btn-danger fileinput-exists"
               data-dismiss="fileinput"><i class="fa fa-times"></i> Supprimer</a>
        </div>
        <button type="reset" class="btn btn-outline-danger btn-block btn-round">Annuler</button>

        <button type="submit" class="btn btn-outline-primary btn-block btn-round">Editer</button>
    </form>



@endsection