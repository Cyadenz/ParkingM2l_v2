<?php $__env->startSection('content'); ?> 
	<!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
            <a>
              <h2 class="post-title">
                Bienvenue sur le site de réservation des places de Parking de la maison des ligues de Lorraine
              </h2>
            </a>
            <p class="post-meta">Vous pouvez réserver une place de Parking dès maintenant en cliquant <a href="<?php echo e(route('rDashboard')); ?>">ici</a></p>

          </div>   
        </div>
      </div>
    </div>

    <hr>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>