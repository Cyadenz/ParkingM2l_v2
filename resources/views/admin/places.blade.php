@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Réservations</a>
        </li>
        <li class="breadcrumb-item active">Gestion des places</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> Places</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped data-table" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Numéro de la place</th>
                  <th>réserver</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Numéro de la place</th>
                  <th>réserver</th>
                  <th>Actions</th>
                </tr>
              </tfoot>

              <tbody>
              @foreach($places as $place)
                <tr>
                  <td>{{$place->idplace}}</td>
                  <td>{{$place->numplace}}</td>
                  @if($place->reserver)
                    <td>Oui</td>
                  @else
                    <td>Non</td>
                  @endif
                  <td>
                      <a href="{{ route('aPlaceSupp', $place->idplace) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                  </td>
                </tr>
              @endforeach
              <tr>
                  <td>{{($places->last())->idplace +1}}</td>
                  <td><em>Non crée</em></td>
                  <td><em>Non crée</em></td>
                  <td>
                      <a href="{{ route('aPlaceCreate') }}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
                  </td>
                </tr>

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
