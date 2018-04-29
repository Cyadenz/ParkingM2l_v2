<?php $__env->startSection('content'); ?>
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
              <?php $__currentLoopData = $utils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $util): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($util->id); ?></td>
                  <td><?php echo e($util->nom); ?></td>
                  <td><?php echo e($util->prenom); ?></td>
                  <td><?php echo e($util->email); ?></td>
                  <td><?php echo e($util->telephone); ?></td>
                  <td><?php echo e($util->created_at); ?></td>
                  <?php if($util->admin): ?>
                    <td>Oui</td>
                  <?php else: ?>
                    <td>Non</td>
                  <?php endif; ?>
                  <?php if($util->Comptevalider): ?>
                    <td>Oui</td>
                  <?php else: ?>
                    <td>Non</td>
                  <?php endif; ?>
                  <td>
                      <?php if(!$util->Comptevalider): ?>
                        <a href="<?php echo e(route('aUtilVal', $util->id)); ?>" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                      <?php endif; ?>
                      <a href="<?php echo e(route('aUtilSelect', $util->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="<?php echo e(route('aUtilSupp', $util->id)); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Dernière mise à jour le : <?php echo e($updated); ?></div>
      </div>
          <?php if(session('status') && session('status') != 'Suppression effectuée avec succès'): ?>
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><i class="fa fa-check"></i> <?php echo e((session('status'))); ?></strong>
            </div>
          <?php elseif(session('status') && session('status') == 'Suppression effectuée avec succès'): ?>
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong><i class="fa fa-check"></i> <?php echo e((session('status'))); ?></strong>
              </div>
          <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>