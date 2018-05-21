@extends('layouts.admin')


@section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Utilisateurs</a>
        </li>
        <li class="breadcrumb-item active">Gestion des Utilisateurs</li>
      </ol>
    <div class="card card-register mx-auto mt-5 mb-5">

      <div class="card-header">Utilisateur numéro {{$user->id}}</div>
      <div class="card-body">

        <form class="form-horizontal" method="POST" action="{{ route('aUtilStore', $user->id) }}">
            {{ csrf_field() }}

        <ol class="breadcrumb">
          <li class="breadcrumb-item ">Identifiants</li>
        </ol>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6{{ $errors->has('nom') ? ' has-error' : '' }}">
                <label for="nom" class="control-label">Nom</label>

                    <input id="nom" type="text" class="form-control" name="nom" value="{{$user->nom}}" required>

                    @if ($errors->has('nom'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nom') }}</strong>
                        </span>
                    @endif
              </div>
              <div class="col-md-6{{ $errors->has('prenom') ? ' has-error' : '' }}">
                <label for="prenom" class="control-label">Prénom</label>
                    <input id="prenom" type="text" class="form-control" name="prenom" value="{{$user->prenom}}" required>
                    @if ($errors->has('prenom'))
                        <span class="help-block">
                            <strong>{{ $errors->first('prenom') }}</strong>
                        </span>
                    @endif
              </div>
            </div>
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="name" class="control-label">Adresse Email</label>

                <input id="email" type="text" class="form-control" name="email" value="{{$user->email}}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Mot de passe</label>

                    <input id="password" type="password" class="form-control" name="password" value="{{$user->password}}" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
              </div>
              <div class="col-md-6">
                <label for="password-confirm" class="control-label">Confirmation</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{$user->password}}" required>
              </div>
            </div>
          </div><br/>

     
          <ol class="breadcrumb">
            <li class="breadcrumb-item ">Informations diverses</li>
          </ol>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6{{ $errors->has('telephone') ? ' has-error' : '' }}">
                <label for="telephone" class="control-label">Téléphone</label>

                    <input id="telephone" type="telephone" class="form-control" name="telephone" value="{{$user->telephone}}" required>
                    @if ($errors->has('telephone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telephone') }}</strong>
                        </span>
                    @endif
              </div>
              <div class="col-md-6{{ $errors->has('admin') ? ' has-error' : '' }}">
                <label for="admin" class="control-label">Administrateur</label>

              <select id="admin" name="admin" class="form-control">
                <option value="0" 
                  @if($user->admin)
                    selected="1"
                  @endif 
                  >Non
                </option>
                <option value="1" 
                  @if($user->admin)
                    selected="1"
                  @endif
                  >Oui
                </option>
              </select>

              </div>
            </div>
          </div>

          <br/>

          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">
                Modifier
              </button>
          </div>
        </form>
        <a href="/aUtilisateurs">Retour aux profils</a>
      </div>
    </div>

@endsection