<?php $__env->startSection('content'); ?>

	<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <h1><i class="fa fa-info-circle"></i> Mes informations</h1>
        <hr>
        <br/>
        <form name="sentMessage" id="contactForm" class="form-horizontal" method="POST" action="<?php echo e(route('home')); ?>">
            <?php echo e(csrf_field()); ?>

          <div class="form-group floating-label-form-group controls">
            <div class="form-row">
              <div class="col-md-6<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
              <div class="post-preview">
                <p class="post-meta">Nom</p>
              </div>

                <input type="text" id="nom" name="nom" class="form-control" value="<?php echo e($user->nom); ?>" required>
                <?php if($errors->has('nom')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('nom')); ?></strong>
                    </span>
                <?php endif; ?>
              </div>

              <div class="col-md-6">
              <div class="post-preview">
                <p class="post-meta">Prenom</p>
              </div>
                <input type="text" id="prenom" name="prenom" class="form-control" value="<?php echo e($user->prenom); ?>" required>
                <?php if($errors->has('prenom')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('prenom')); ?></strong>
                    </span>
                <?php endif; ?>
              </div>

            </div>
          </div><br/>

          <div class="form-group floating-label-form-group controls">
            <div class="form-row">
              <div class="col-md-6<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
              <div class="post-preview">
                <p class="post-meta">Email</p>
              </div>

                <input type="text" id="email" name="email" class="form-control" value="<?php echo e($user->email); ?>" required>
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
              </div>

              <div class="col-md-6">
              <div class="post-preview">
                <p class="post-meta">Téléphone</p>
              </div>
                <input type="text" id="telephone" name="telephone" class="form-control" value="0<?php echo e($user->telephone); ?>" required>
                <?php if($errors->has('telephone')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('telephone')); ?></strong>
                    </span>
                <?php endif; ?>
              </div>

            </div>
          </div><br/>

		<div class="form-group floating-label-form-group controls">
            <div class="form-row">
              <div class="col-md-6<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
              <div class="post-preview">
                <p class="post-meta">Mot de passe</p>
              </div>

                <input type="password" id="password" name="password" class="form-control" placeholder="Entrer votre mot de passe" required>
                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>
              </div>

              <div class="col-md-6<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
              <div class="post-preview">
                <p class="post-meta">Confirmation</p>
              </div>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirmer votre mot de passe" required>
              </div>

            </div>
          </div><br/>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary float-right" id="sendMessageButton">Modifier&rarr;</button>
            </div>
          </form>

          <!-- Pager -->
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>