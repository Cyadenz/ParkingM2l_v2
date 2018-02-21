@extends('layouts.default')

@section('content')

	<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <h1><i class="fa fa-info-circle"></i> Mes informations</h1>
        <hr>
        <br/>
        <form name="sentMessage" id="contactForm" class="form-horizontal" method="POST" action="{{ route('home') }}">
            {{ csrf_field() }}
          <div class="form-group floating-label-form-group controls">
            <div class="form-row">
              <div class="col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="post-preview">
                <p class="post-meta">Nom</p>
              </div>

                <input type="text" id="nom" name="nom" class="form-control" value="{{$user->nom}}" required>
                @if ($errors->has('nom'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nom') }}</strong>
                    </span>
                @endif
              </div>

              <div class="col-md-6">
              <div class="post-preview">
                <p class="post-meta">Prenom</p>
              </div>
                <input type="text" id="prenom" name="prenom" class="form-control" value="{{$user->prenom}}" required>
                @if ($errors->has('prenom'))
                    <span class="help-block">
                        <strong>{{ $errors->first('prenom') }}</strong>
                    </span>
                @endif
              </div>

            </div>
          </div><br/>

          <div class="form-group floating-label-form-group controls">
            <div class="form-row">
              <div class="col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="post-preview">
                <p class="post-meta">Email</p>
              </div>

                <input type="text" id="email" name="email" class="form-control" value="{{$user->email}}" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>

              <div class="col-md-6">
              <div class="post-preview">
                <p class="post-meta">Téléphone</p>
              </div>
                <input type="text" id="telephone" name="telephone" class="form-control" value="0{{$user->telephone}}" required>
                @if ($errors->has('telephone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('telephone') }}</strong>
                    </span>
                @endif
              </div>

            </div>
          </div><br/>

		<div class="form-group floating-label-form-group controls">
            <div class="form-row">
              <div class="col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="post-preview">
                <p class="post-meta">Mot de passe</p>
              </div>

                <input type="password" id="password" name="password" class="form-control" placeholder="Entrer votre mot de passe" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>

              <div class="col-md-6{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <div class="post-preview">
                <p class="post-meta">Confirmation</p>
              </div>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirmer votre mot de passe" required>
              </div>

            </div>
          </div><br/>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary float-right" id="sendMessageButton">Modifier&rarr;</button>
            </div>
          </form>

          <!-- Pager -->
        </div>
      </div>
    </div>
@endsection