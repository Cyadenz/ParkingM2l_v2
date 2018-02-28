@extends('layouts.admin')

@section('content')

  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">File d'attente</a>
        </li>
        <li class="breadcrumb-item active">Gestion de la file d'attente</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header"><i class="fa fa-table"></i> File d'attente</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped data-table" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Rang</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Rang</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Actions</th>
                </tr>
              </tfoot>

              <tbody>
              @foreach($users as $user)
                <tr>
                  <td>{{$user->rang}}</td>
                  <td>{{$user->nom}}</td>
                  <td>{{$user->prenom}}</td>
                  <td>
                      <a href="{{ route('home') }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                      <a href="{{ route('home') }}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
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
