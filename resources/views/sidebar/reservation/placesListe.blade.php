@extends('layouts.default')

@section('content')
<!-- 	<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Utilisateurs</a>
        </li>
        <li class="breadcrumb-item active">Gestion des Utilisateurs</li>
      </ol> -->
      <!-- Example DataTables Card-->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">

          @if (!$nbrplacesR == 0)
            <div class="alert alert-warning alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>Il semblerait que toutes les places soient prises voulez vous passer en liste d'attente ?</strong>
            </div>
          @endif

      <div class="card mb-3">
        <div class="card-header"><center><i class="fa fa-table"></i> Place(s) disponible(s)</center></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped data-table" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Numéro de la place</th>
                  <th>Réserver</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Numéro de la place</th>
                  <th>Réserver</th>
                  <th>Actions</th>
                </tr>
              </tfoot>

              <tbody>
              @foreach($places as $place)
                <tr>
                  <td>{{$place->numplace}}</td>
                  @if($place->reserver)
                  <td>Oui</td>
                  @else
                  <td>Non</td>
                  @endif
                  <td>
                      @if( is_null(Auth::user()->idPlaceReserve) && is_null($place->idUserReserve) )
                        <a href="{{ route('rPlaceSelect', $place->idplace) }}" class="btn btn-primary btn-xs"><i class="fa fa-plus-square"></i></a>
                      @elseif($place->idUserReserve == Auth::user()->id )                     
                      @else
                        <br/><br/>
                      @endif
                      @if($place->idUserReserve == Auth::user()->id )
                        <a href="{{ route('rPlaceSupp', $place->idplace) }}" class="btn btn-danger btn-xs"><i class="fa fa-minus-square"></i></a>
                      @endif
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
          @if (session('status') && session('status') != 'Vous avez retiré votre réservation')
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><i class="fa fa-check"></i> {{(session('status'))}}</strong>
            </div>
          @elseif(session('status') && session('status') == 'Vous avez retiré votre réservation')
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><i class="fa fa-check"></i> {{(session('status'))}}</strong>
              </div>
          @endif
          </div>
          </div>
          </div>
@endsection