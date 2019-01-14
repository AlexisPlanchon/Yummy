@extends('layouts.app')

@section('content')
    <h3>Article</h3>




    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{route('articles.store')}}" enctype="multipart/form-data">
        {!! csrf_field() !!}

        <textarea type="text" class="form-control textarea-limited" name="titre" placeholder="Titre de l'article" rows="1" , maxlength="100"></textarea><br>
        <textarea type="text" class="form-control textarea-limited" name="summary" placeholder="Sommaire de l'article" rows="6" , maxlength="10000"></textarea><br>
        <textarea type="text" class="form-control textarea-limited" name="contenu" placeholder="Contenu de l'article" rows="13" , maxlength="10000"></textarea>


    <h3>Ajout Image ou vidéo</h3>

    <div class="fileinput-preview fileinput-exists thumbnail img-no-padding" style="max-width: 370px; max-height: 250px;"></div>
    <div>
        <span class="fileinput-new">Choisir un fichier</span>

            <input  type="file" name="media"></input>
        <a href="" data-dismiss="fileinput"><i class="fa fa-times"></i> Supprimer</a>
    </div>
        <button class="btn" type="reset">Annuler</button>

        <button class="btn" type="submit">Ajouter</button>
    </form>



@endsection