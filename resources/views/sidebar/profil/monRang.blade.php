@extends('layouts.default')

@section('content')
	
	<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <h1><i class="fa fa-clock-o"></i> Mon rang</h1>
        <hr>
        <br/>
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

        <div class="post-preview">
            <a>
              <h3 class="post-subtitle">
                @if(Auth::user()->rang != NULL)
                  Votre rang sur la file d'attente est actuellement : {{Auth::user()->rang}} sur {{$nbrRang}} personne(s).
                @else
                  Vous n'êtes pas sur la file d'attente.
                @endif
              </h3>
            </a>
        </div><br/>
         <a class="btn btn-primary float-left" href="/sMonProfil">&cularr; Retour</a> 
         <a class="btn btn-primary float-right" href="/">Actualiser &olarr;</a> 

          <!-- Pager -->
        </div>
      </div>
    </div>

@endsection