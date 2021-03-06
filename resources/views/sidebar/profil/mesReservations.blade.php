@extends('layouts.default')

@section('content')
	
	<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <h1><i class="fa fa-clock-o"></i> Mes réservations</h1>
        <hr>
        <br/>
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

        <div class="post-preview">
            <a>
              <h3 class="post-subtitle">
                @if( Auth::user()-> idPlaceReserve == null)
                  Vous n'avez pas réservée de place.
                @else

                  Votre place réservée est la place numéro : {{Auth::user()->idPlaceReserve}}.<br /><br />

                  @if(isset($reserv[0]))
                    Cette place vous a été attributé du {{$reserv[0]->debutperiode}} au {{$reserv[0]->finperiode}}.
                  @else
                    Cette place n' a pas encore été attribué par l'administrateur.  
                  @endif

                @endif
              </h3>
            </a>
        </div><br/>
         <a class="btn btn-primary float-left" href="/sMonProfil">&cularr; Retour</a> 

          <!-- Pager -->
        </div>
      </div>
    </div>

@endsection