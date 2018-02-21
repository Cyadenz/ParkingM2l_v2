<?php $__env->startSection('content'); ?>
	
	<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <h1><i class="fa fa-user"></i> Mon profil</h1>
        <hr>
        <br/>
          <div class="post-preview">
            <a>
              <h2 class="post-title">
                <i class="fa fa-chevron-right" style="color: red"></i> Afficher mes réservations
              </h2>
              <h3 class="post-subtitle">
                Regarder les places actuellements disponibles !
              </h3>
            </a>
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="/rPlaces">Mes réservations&rarr;</a>
          </div>
          </div>
          <hr>

          <div class="post-preview">
            <a>
              <h2 class="post-title">
                <i class="fa fa-chevron-right" style="color: red"></i> Afficher mon rang dans la file d'attente
              </h2>
              <h3 class="post-subtitle">
                Regarder les places actuellements disponibles !
              </h3>
            </a>
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="/sMonRang">Mon rang&rarr;</a>
          </div>
          </div>
          <hr>

          <div class="post-preview">
            <a>
              <h2 class="post-title">
               <i class="fa fa-chevron-right" style="color: red"></i> Modifier mes informations personnelles
              </h2>
              <h3 class="post-subtitle">
                Regarder les places actuellements disponibles !
              </h3>
            </a>
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="/sMesInfos">Mes informations&rarr;</a>
          </div>
          </div>
          <hr>
          <a class="btn btn-primary float-left" href="/">&cularr; Retour</a>
          <!-- Pager -->
        </div>
      </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>