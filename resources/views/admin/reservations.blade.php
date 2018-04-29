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
              @foreach($joins as $join)
                <tr>

                  <td>{{$join->nom}}</td>
                  <td>{{$join->prenom}}</td>
                  <td>{{$join->email}}</td>

                  <td>{{$join->id_place}}</td>
                  @if($join->debutperiode == '1998-10-10')
                    <td><em>Non attribuée</em></td>
                  @else
                    <td>{{$join->debutperiode}}</td>
                  @endif

                  @if($join->finperiode == '1998-10-10')
                    <td><em>Non attribuée</em></td>
                  @else
                    <td>{{$join->finperiode}}</td>
                  @endif

                  @if($join->valider)
                    <td>Oui</td>
                  @else
                    <td>Non</td>
                  @endif
                  <td>
                    @if(!$join->valider)
                      <a href="{{ route('aReservValidation', $join->id_place) }}" class="btn btn-primary btn-xs"><i class="fa fa-check"></i></a>
                    @endif
                      <a href="{{ route('aReservSupp', $join->id_place) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Dernière mise à jour le : 29/04/2018</div>
      </div>
          @if (session('status') && session('status') != 'Suppression effectuée avec succès')
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><i class="fa fa-check"></i> {{(session('status'))}}</strong>
            </div>
          @elseif(session('status') && session('status') == 'Suppression effectuée avec succès')
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><i class="fa fa-check"></i> {{(session('status'))}}</strong>
              </div>
          @endif
@endsection
