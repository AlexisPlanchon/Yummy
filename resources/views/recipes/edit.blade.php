@extends('layouts.app')

@section('content')
    <h3>Recette - Edition</h3>




    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{route('recettes.update',[$recipe->id])}}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {!! method_field('put') !!}

        <textarea class="form-control textarea-limited" name="name" placeholder="Titre de la recette" rows="1" , maxlength="100">{{$recipe->name}}</textarea><br>
        <textarea class="form-control textarea-limited" name="steps" placeholder="Contenu de la recette" rows="13" , maxlength="1000">{{$recipe->steps}}</textarea><br>
        <textarea class="form-control textarea-limited" name="ingredients" placeholder="Ingrédients de la recette" rows="13" , maxlength="1000">{{$recipe->ingredients}}</textarea><br>
        <textarea class="form-control textarea-limited" name="difficulty" placeholder="Difficulté de la recette" rows="1" , maxlength="2">{{$recipe->difficulty}}</textarea><br>
        <textarea class="form-control textarea-limited" name="preparation_time" placeholder="Temps de préparation de la recette" rows="1" , maxlength="10">{{$recipe->preparation_time}}</textarea><br>
        <textarea class="form-control textarea-limited" name="cooking_time" placeholder="Temps de cuisine de la recette" rows="1" , maxlength="1000">{{$recipe->cooking_time}}</textarea><br>
        <textarea class="form-control textarea-limited" name="materials" placeholder="Matériaux de la recette" rows="13" , maxlength="1000">{{$recipe->materials}}</textarea><br>
        <textarea class="form-control textarea-limited" name="astuce" placeholder="Astuce de la recette" rows="13" , maxlength="1000">{{$recipe->astuce}}</textarea><br>


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