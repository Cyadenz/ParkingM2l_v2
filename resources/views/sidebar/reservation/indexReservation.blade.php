@extends('layouts.default')

@section('content')
	
	

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

          <div class="post-preview">
            <a>
              <h2 class="post-title">
                <i class="fa fa-chevron-right" style="color: red"></i> Vous souhaitez réserver une place dans le Parking de la M2L ?
              </h2>
              @if(!Auth::guest() && !Auth::user()->Comptevalider)
                <h3 class="post-subtitle">
                  Veuillez attendre que l'administrateur valide votre compte avant de pouvoir réserver une place !
                </h3>
              @elseif(Auth::guest())
                <h3 class="post-subtitle">
                  Veuillez tout d'abord vous identifier avant de pouvoir réserver une place ! 
                </h3>
              @else
                <h3 class="post-subtitle">
                  Regarder les places actuellements disponibles !
                </h3>
                </a>
                <div class="clearfix">
                  <a class="btn btn-primary float-right" href="/rPlaces">Places disponibles&rarr;</a>
                </div>
              @endif

          </div>
          <hr>
          <a class="btn btn-primary float-left" href="/">&cularr; Retour</a>

<!--           <div class="post-preview">
            <a>
              <h2 class="post-title">
                <i class="fa fa-chevron-right" style="color: red"></i> Vous souhaitez réserver une place dans le Parking de la M2L ?
              </h2>
              <h3 class="post-subtitle">
                Regarder les places actuellements disponibles !
              </h3>
            </a>
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Places disponibles&rarr;</a>
          </div>
          </div>
          <hr>

          <div class="post-preview">
            <a>
              <h2 class="post-title">
               <i class="fa fa-chevron-right" style="color: red"></i> Vous souhaitez réserver une place dans le Parking de la M2L ?
              </h2>
              <h3 class="post-subtitle">
                Regarder les places actuellements disponibles !
              </h3>
            </a>
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Places disponibles&rarr;</a>
          </div>
          </div>
          <hr> -->

          <!-- Pager -->
        </div>
      </div>
    </div>

@endsection