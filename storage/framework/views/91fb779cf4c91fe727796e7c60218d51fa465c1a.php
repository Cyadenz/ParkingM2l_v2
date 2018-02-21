<?php $__env->startSection('content'); ?>
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

          <?php if(!$nbrplacesR == 0): ?>
            <div class="alert alert-warning alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>Il semblerait que toutes les places soient prises voulez vous passer en liste d'attente ? Si oui cliquer ici</strong>
            </div>
          <?php endif; ?>

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
              <?php $__currentLoopData = $places; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $place): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($place->numplace); ?></td>
                  <?php if($place->reserver): ?>
                  <td>Oui</td>
                  <?php else: ?>
                  <td>Non</td>
                  <?php endif; ?>
                  <td>
                      <?php if( is_null(Auth::user()->idPlaceReserve) && is_null($place->idUserReserve) ): ?>
                        <a href="<?php echo e(route('rPlaceSelect', $place->idplace)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus-square"></i></a>
                      <?php elseif($place->idUserReserve == Auth::user()->id ): ?>                     
                      <?php else: ?>
                        <br/><br/>
                      <?php endif; ?>
                      <?php if($place->idUserReserve == Auth::user()->id ): ?>
                        <a href="<?php echo e(route('rPlaceSupp', $place->idplace)); ?>" class="btn btn-danger btn-xs"><i class="fa fa-minus-square"></i></a>
                      <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
          <?php if(session('status') && session('status') != 'Vous avez retiré votre réservation'): ?>
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><i class="fa fa-check"></i> <?php echo e((session('status'))); ?></strong>
            </div>
          <?php elseif(session('status') && session('status') == 'Vous avez retiré votre réservation'): ?>
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><i class="fa fa-check"></i> <?php echo e((session('status'))); ?></strong>
              </div>
          <?php endif; ?>
          </div>
          </div>
          </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>