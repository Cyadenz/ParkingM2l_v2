@extends('layouts.default')

@section('content') 

   <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <h4><i class="fa fa-user"></i> Connexion</h4>
          <br />
					<form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group floating-label-form-group controls{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Adresse Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" placeholder="Adresse Email" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br/>

                        <div class="form-group floating-label-form-group controls{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" placeholder="Mot de passe" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br/><br/>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <center><div class="col-md-8 col-md-offset-4">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Mot de passe oublié?
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    Login&rarr;
                                </button>
                                
                            </center></div>
                        </div>
                    </form>

        </div>
      </div>
    </div>

    <hr>
@endsection
