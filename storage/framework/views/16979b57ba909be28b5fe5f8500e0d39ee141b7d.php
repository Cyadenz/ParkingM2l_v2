<?php $__env->startSection('content'); ?>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Utilisateurs</a>
        </li>
        <li class="breadcrumb-item active">Gestion des Utilisateurs</li>
      </ol>
    <div class="card card-register mx-auto mt-5 mb-5">

      <div class="card-header">Utilisateur numéro <?php echo e($user->id); ?></div>
      <div class="card-body">

        <form class="form-horizontal" method="POST" action="<?php echo e(route('aUtilStore', $user->id)); ?>">
            <?php echo e(csrf_field()); ?>


        <ol class="breadcrumb">
          <li class="breadcrumb-item ">Identifiants</li>
        </ol>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6<?php echo e($errors->has('nom') ? ' has-error' : ''); ?>">
                <label for="nom" class="control-label">Nom</label>

                    <input id="nom" type="text" class="form-control" name="nom" value="<?php echo e($user->nom); ?>" required>

                    <?php if($errors->has('nom')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('nom')); ?></strong>
                        </span>
                    <?php endif; ?>
              </div>
              <div class="col-md-6<?php echo e($errors->has('prenom') ? ' has-error' : ''); ?>">
                <label for="prenom" class="control-label">Prénom</label>
                    <input id="prenom" type="text" class="form-control" name="prenom" value="<?php echo e($user->prenom); ?>" required>
                    <?php if($errors->has('prenom')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('prenom')); ?></strong>
                        </span>
                    <?php endif; ?>
              </div>
            </div>
          </div>

          <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <label for="name" class="control-label">Adresse Email</label>

                <input id="email" type="text" class="form-control" name="email" value="<?php echo e($user->email); ?>" required>

                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <label for="password" class="control-label">Mot de passe</label>

                    <input id="password" type="password" class="form-control" name="password" value="<?php echo e($user->password); ?>" required>

                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                    <?php endif; ?>
              </div>
              <div class="col-md-6">
                <label for="password-confirm" class="control-label">Confirmation</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="<?php echo e($user->password); ?>" required>
              </div>
            </div>
          </div><br/>

     
          <ol class="breadcrumb">
            <li class="breadcrumb-item ">Informations diverses</li>
          </ol>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6<?php echo e($errors->has('telephone') ? ' has-error' : ''); ?>">
                <label for="telephone" class="control-label">Téléphone</label>

                    <input id="telephone" type="telephone" class="form-control" name="telephone" value="<?php echo e($user->telephone); ?>" required>
                    <?php if($errors->has('telephone')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('telephone')); ?></strong>
                        </span>
                    <?php endif; ?>
              </div>
              <div class="col-md-6<?php echo e($errors->has('admin') ? ' has-error' : ''); ?>">
                <label for="admin" class="control-label">Administrateur</label>

              <select id="admin" name="admin" class="form-control">
                <option value="0" 
                  <?php if($user->admin): ?>
                    selected="1"
                  <?php endif; ?> 
                  >Non
                </option>
                <option value="1" 
                  <?php if($user->admin): ?>
                    selected="1"
                  <?php endif; ?>
                  >Oui
                </option>
              </select>

              </div>
            </div>
          </div>

          <br/>

          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">
                Modifier
              </button>
          </div>
        </form>
        <a href="/aUtilisateurs">Retour aux profils</a>
      </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>