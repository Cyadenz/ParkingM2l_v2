<?php $__env->startSection('content'); ?>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
            <a>
              <h3 class="post-subtitle">
                Vous êtes sur le point de reserver la place numéro : <?php echo e($place[0]->idplace); ?>.
              </h3>
            </a>
            <p class="post-meta">Veuillez saisir la période durant lequel vous voulez réserver cette place.</p>
          </div>

          <form name="sentMessage" id="contactForm" class="form-horizontal" method="POST" action="<?php echo e(route('rPlace', $place[0]->idplace)); ?>">
            <?php echo e(csrf_field()); ?>

          <div class="form-group floating-label-form-group controls">
            <div class="form-row">
              <div class="col-md-6<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
              <div class="post-preview">
                <p class="post-meta">Date de début</p>
              </div>

                <input type="date" id="debutperiode" name="debutperiode" class="form-control" required>
                <?php if($errors->has('debutperiode')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('debutperiode')); ?></strong>
                    </span>
                <?php endif; ?>
              </div>

              <div class="col-md-6">
              <div class="post-preview">
                <p class="post-meta">Date de fin</p>
              </div>
                <input type="date" id="finperiode" name="finperiode" class="form-control" required>
                <?php if($errors->has('finperiode')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('finperiode')); ?></strong>
                    </span>
                <?php endif; ?>
              </div>

            </div>
          </div><br/>

            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary float-right" id="sendMessageButton">Réserver&rarr;</button>
              <a class="btn btn-primary float-left" href="/rPlaces">&cularr; Retour</a>
            </div>
          </form>

        </div>
      </div>
    </div>

    <hr>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>