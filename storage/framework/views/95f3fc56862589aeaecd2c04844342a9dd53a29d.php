<?php $__env->startSection('content'); ?> 
   <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <h4><i class="fa fa-book"></i> S'enregistrer</h4>
          <br />
					
			<form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group floating-label-form-group controls<?php echo e($errors->has('nom') ? ' has-error' : ''); ?>">
                            <label for="nom" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control" placeholder="Nom" name="nom" value="<?php echo e(old('nom')); ?>" required autofocus>

                                <?php if($errors->has('nom')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nom')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div><br/>

                        <div class="form-group floating-label-form-group controls <?php echo e($errors->has('prenom') ? ' has-error' : ''); ?>">
                            <label for="prenom" class="col-md-4 control-label">Prenom</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control" placeholder="Prenom" name="prenom" value="<?php echo e(old('prenom')); ?>" required autofocus>

                                <?php if($errors->has('prenom')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('prenom')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div><br/>

                        <div class="form-group floating-label-form-group controls <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Adresse Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" placeholder="Adresse Email" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div><br/>

                        <div class="form-group floating-label-form-group controls <?php echo e($errors->has('telephone') ? ' has-error' : ''); ?>">
                            <label for="telephone" class="col-md-4 control-label">Téléphone</label>

                            <div class="col-md-6">
                                <input id="telephone" type="telephone" class="form-control" placeholder="Téléphone" name="telephone" value="<?php echo e(old('telephone')); ?>" required>

                                <?php if($errors->has('telephone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('telephone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div><br/>

                        <div class="form-group floating-label-form-group controls <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" placeholder="Mot de passe" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div><br/>

                        <div class="form-group floating-label-form-group controls">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmation</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirmation" name="password_confirmation" required>
                            </div>
                        </div><br/>

                        <div class="form-group">
                            <center>
                            	<div class="col-md-12 col-md-offset-4">
                                <a class="btn btn-link" href="<?php echo e(route('login')); ?>">
                                    Vous posséder déjà un compte?
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    S'enregistrer &rarr;
                                </button>
                               </div> 
                            </center>
                        </div>
                    </form>

        </div>
      </div>
    </div>

    <hr>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>