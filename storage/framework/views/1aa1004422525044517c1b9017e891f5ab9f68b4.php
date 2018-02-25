<?php $__env->startSection('content'); ?>

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
              <?php $__currentLoopData = $reservs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reserv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($utils[(($reserv->id_users)-1)]->nom); ?></td>
                  <td><?php echo e($utils[(($reserv->id_users)-1)]->prenom); ?></td>
                  <td><?php echo e($utils[(($reserv->id_users)-1)]->email); ?></td>
                  <td><?php echo e($reserv->id_place); ?></td>
                  <?php if($reserv->debutperiode == '1998-10-10'): ?>
                    <td><em>Non attribuée</em></td>
                  <?php else: ?>
                    <td><?php echo e($reserv->debutperiode); ?></td>
                  <?php endif; ?>

                  <?php if($reserv->finperiode == '1998-10-10'): ?>
                    <td><em>Non attribuée</em></td>
                  <?php else: ?>
                    <td><?php echo e($reserv->finperiode); ?></td>
                  <?php endif; ?>

                  <?php if($reserv->valider): ?>
                    <td>Oui</td>
                  <?php else: ?>
                    <td>Non</td>
                  <?php endif; ?>
                  <td>
                    <?php if(!$reserv->valider): ?>
                      <a href="<?php echo e(route('aReservValidation', $reserv->id_place)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-check"></i></a>
                    <?php endif; ?>
                      <a href="<?php echo e(route('aReservSupp', $reserv->id_place)); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Dernière mise à jour le : <?php echo e($updated); ?></div>
      </div>
          <?php if(session('status') && session('status') != 'Suppresion éffectuée avec succès'): ?>
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><i class="fa fa-check"></i> <?php echo e((session('status'))); ?></strong>
            </div>
          <?php elseif(session('status') && session('status') == 'Suppresion éffectuée avec succès'): ?>
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><i class="fa fa-check"></i> <?php echo e((session('status'))); ?></strong>
              </div>
          <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>