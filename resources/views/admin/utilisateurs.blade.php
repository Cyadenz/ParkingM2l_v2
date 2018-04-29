@extends('layouts.admin')


@section('content')
  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Utilisateurs</a>
        </li>
        <li class="breadcrumb-item active">Gestion des Utilisateurs</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> Utilisateurs inscrits</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped data-table" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Email</th>
                  <th>Téléphone</th>
                  <th>Inscrit le</th>
                  <th>Administrateur</th>
                  <th>Compte validé</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Email</th>
                  <th>Téléphone</th>
                  <th>Inscrit le</th>
                  <th>Administrateur</th>
                  <th>Compte validé</th>
                  <th>Actions</th>
                </tr>
              </tfoot>

              <tbody>
              @foreach($utils as $util)
                <tr>
                  <td>{{$util->id}}</td>
                  <td>{{$util->nom}}</td>
                  <td>{{$util->prenom}}</td>
                  <td>{{$util->email}}</td>
                  <td>{{$util->telephone}}</td>
                  <td>{{$util->created_at}}</td>
                  @if($util->admin)
                    <td>Oui</td>
                  @else
                    <td>Non</td>
                  @endif
                  @if($util->Comptevalider)
                    <td>Oui</td>
                  @else
                    <td>Non</td>
                  @endif
                  <td>
                      @if(!$util->Comptevalider)
                        <a href="{{ route('aUtilVal', $util->id) }}" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                      @endif
                      <a href="{{ route('aUtilSelect', $util->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="{{ route('aUtilSupp', $util->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Dernière mise à jour le : {{$updated}}</div>
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