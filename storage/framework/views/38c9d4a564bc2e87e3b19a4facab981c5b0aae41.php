<?php $__env->startSection('content'); ?> 

   <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <h4><i class="fa fa-user"></i> Connexion</h4>
          <br />
					<form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group floating-label-form-group controls<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Adresse Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" placeholder="Adresse Email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div><br/>

                        <div class="form-group floating-label-form-group controls<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" placeholder="Mot de passe" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <br/><br/>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <center><div class="col-md-8 col-md-offset-4">
                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    Mot de passe oublié?
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    Login&rarr;
                                </button>
                                
                            </center></div>
                        </div>
                    </form>

        </div>
      </div>
    </div>

    <hr>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>