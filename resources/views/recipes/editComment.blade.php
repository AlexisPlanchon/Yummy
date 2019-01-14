@extends('layouts.app')

@section('content')
    <h3>Commentaire - Edition</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{route('updateCommentaire',[$comment->id])}}">
        {!! csrf_field() !!}
        {!! method_field('put') !!}

        <textarea class="form-control textarea-limited comment" name="content" placeholder="Contenu" rows="1" , maxlength="100">{{$comment->content}}</textarea>

        <button class="btn" type="reset">Annuler</button>

        <button class="btn" type="submit">Ajouter</button>
    </form>



@endsection