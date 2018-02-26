@extends('layouts.default')

@section('content') 
   <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <h4><i class="fa fa-book"></i> S'enregistrer</h4>
          <br />
					
			<form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group floating-label-form-group controls{{ $errors->has('nom') ? ' has-error' : '' }}">
                            <label for="nom" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control" placeholder="Nom" name="nom" value="{{ old('nom') }}" required autofocus>

                                @if ($errors->has('nom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br/>

                        <div class="form-group floating-label-form-group controls {{ $errors->has('prenom') ? ' has-error' : '' }}">
                            <label for="prenom" class="col-md-4 control-label">Prenom</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control" placeholder="Prenom" name="prenom" value="{{ old('prenom') }}" required autofocus>

                                @if ($errors->has('prenom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('prenom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br/>

                        <div class="form-group floating-label-form-group controls {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Adresse Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" placeholder="Adresse Email" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br/>

                        <div class="form-group floating-label-form-group controls {{ $errors->has('telephone') ? ' has-error' : '' }}">
                            <label for="telephone" class="col-md-4 control-label">Téléphone</label>

                            <div class="col-md-6">
                                <input id="telephone" type="telephone" class="form-control" placeholder="Téléphone" name="telephone" value="{{ old('telephone') }}" required>

                                @if ($errors->has('telephone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br/>

                        <div class="form-group floating-label-form-group controls {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" placeholder="Mot de passe" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br/>

                        <div class="form-group floating-label-form-group controls">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmation</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirmation" name="password_confirmation" required>
                            </div>
                        </div><br/>

                        <div class="form-group">
                            <center>
                            	<div class="col-md-12 col-md-offset-4">
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    Vous posséder déjà un compte?
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    S'enregistrer &rarr;
                                </button>
                               </div> 
                            </center>
                        </div>
                    </form>

        </div>
      </div>
    </div>

    <hr>
@endsection