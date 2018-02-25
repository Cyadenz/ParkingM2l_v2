@extends('layouts.admin')

@section('content')
	
	  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Réservation</a>
        </li>
        <li class="breadcrumb-item active">Gestion de la réservation de l'utilisateur numéro {{$reservation[0]->id_users}}</li>
      </ol>
      <div class="card card-register mx-auto mt-5 mb-5">
      <div class="card-header">Assignation des dates</div>
      <div class="card-body">

        <form class="form-horizontal" method="POST" action="{{ route('aReservstore', $reservation[0]->id_place) }}">
            {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6{{ $errors->has('debutperiode') ? ' has-error' : '' }}">
                <label for="debutperiode" class="control-label">Date de début</label>

                    <input id="debutperiode" type="date" class="form-control" name="debutperiode" required>

                    @if ($errors->has('debutperiode'))
                        <span class="help-block">
                            <strong>{{ $errors->first('debutperiode') }}</strong>
                        </span>
                    @endif
              </div>
              <div class="col-md-6{{ $errors->has('finperiode') ? ' has-error' : '' }}">
                <label for="finperiode" class="control-label">Date de fin</label>
                    <input id="finperiode" type="date" class="form-control" name="finperiode" required>
                    @if ($errors->has('finperiode'))
                        <span class="help-block">
                            <strong>{{ $errors->first('finperiode') }}</strong>
                        </span>
                    @endif
              </div>
            </div>
          </div>
          <br/>

          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">
                Assigner
              </button>
          </div>
        </form>
        <a href="/aReservations">Retour aux profils</a>
      </div>
    </div>
</div>
@endsection