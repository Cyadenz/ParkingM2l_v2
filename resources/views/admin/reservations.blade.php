@extends('layouts.admin')

@section('content')

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Réservations</a>
        </li>
        <li class="breadcrumb-item active">Gestion des Réservations</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> Réservations demandées</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped data-table" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Email</th>
                  <th>Numéro place</th>
                  <th>Date de début</th>
                  <th>Date de fin</th>
                  <th>Valider</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Email</th>
                  <th>Numéro place</th>
                  <th>Date de début</th>
                  <th>Date de fin</th>
                  <th>Valider</th>
                  <th>Actions</th>
                </tr>
              </tfoot>

              <tbody>
              @foreach($reservs as $reserv)
                <tr>
                  <td>{{$utils[(($reserv->id_users)-1)]->nom}}</td>
                  <td>{{$utils[(($reserv->id_users)-1)]->prenom}}</td>
                  <td>{{$utils[(($reserv->id_users)-1)]->email}}</td>
                  <td>{{$reserv->id_place}}</td>
                  @if($reserv->debutperiode == '1998-10-10')
                    <td><em>Non attribuée</em></td>
                  @else
                    <td>{{$reserv->debutperiode}}</td>
                  @endif

                  @if($reserv->finperiode == '1998-10-10')
                    <td><em>Non attribuée</em></td>
                  @else
                    <td>{{$reserv->finperiode}}</td>
                  @endif

                  @if($reserv->valider)
                    <td>Oui</td>
                  @else
                    <td>Non</td>
                  @endif
                  <td>
                    @if(!$reserv->valider)
                      <a href="{{ route('aReservValidation', $reserv->id_place) }}" class="btn btn-primary btn-xs"><i class="fa fa-check"></i></a>
                    @endif
                      <a href="{{ route('aReservSupp', $reserv->id_place) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Dernière mise à jour le : {{$updated}}</div>
      </div>
          @if (session('status') && session('status') != 'Suppresion éffectuée avec succès')
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><i class="fa fa-check"></i> {{(session('status'))}}</strong>
            </div>
          @elseif(session('status') && session('status') == 'Suppresion éffectuée avec succès')
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><i class="fa fa-check"></i> {{(session('status'))}}</strong>
              </div>
          @endif
@endsection
