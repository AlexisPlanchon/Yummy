@extends('layouts.app')

@section('content')
<div class='login'>
    <form action="{{ route('register') }}" method="post">
    {{ csrf_field() }}
                <h2>S'enregistrer</h2>
                <!--<input name='username' placeholder='Adresse E-mail' type='text' value="{{ old('email') }}" required autofocus/>
                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif-->
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nom" required autofocus>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Adresse E-mail" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confimer mot de passe" name="password_confirmation" required>
                                <input type='submit' value="S'enregistrer"/>
</form>
</div>


@endsection
