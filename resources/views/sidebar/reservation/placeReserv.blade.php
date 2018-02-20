@extends('layouts.default')

@section('content')

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
            <a href="post.html">
              <h3 class="post-subtitle">
                Vous êtes sur le point de reserver la place numéro : {{$place[0]->idplace}}.
              </h3>
            </a>
            <p class="post-meta">Veuillez saisir la période durant lequel vous voulez réserver cette place.</p>
          </div>

          <form name="sentMessage" id="contactForm" class="form-horizontal" method="POST" action="{{ route('rPlace', $place[0]->idplace) }}">
            {{ csrf_field() }}
          <div class="form-group floating-label-form-group controls">
            <div class="form-row">
              <div class="col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
              <div class="post-preview">
                <p class="post-meta">Date de début</p>
              </div>

                <input type="date" id="debutperiode" name="debutperiode" class="form-control" required>
                @if ($errors->has('debutperiode'))
                    <span class="help-block">
                        <strong>{{ $errors->first('debutperiode') }}</strong>
                    </span>
                @endif
              </div>

              <div class="col-md-6">
              <div class="post-preview">
                <p class="post-meta">Date de fin</p>
              </div>
                <input type="date" id="finperiode" name="finperiode" class="form-control" required>
                @if ($errors->has('finperiode'))
                    <span class="help-block">
                        <strong>{{ $errors->first('finperiode') }}</strong>
                    </span>
                @endif
              </div>

            </div>
          </div><br/>

            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary float-right" id="sendMessageButton">Réserver&rarr;</button>
            </div>
          </form>

        </div>
      </div>
    </div>

    <hr>

@endsection