<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Parking de la M2L</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="<?php echo e(asset ('vendor/magnific-popup/magnific-popup.css')); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/creative.min.css')); ?>" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">Accueil</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#about">A propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#contact">Contact</a>
            </li>
          </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <!-- Authentication Links -->
              <?php if(auth()->guard()->guest()): ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo e(route('login')); ?>">Se connecter</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?php echo e(route('register')); ?>">S'enregistrer</a></li>

              <?php else: ?>
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                    <?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->prenom); ?> <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                    <li>
                      <a class="dropdown-item" href="/"> 
                        <i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp;Mon profil
                      </a>
<!--                       <?php if(Auth::user()->admin): ?>

                      <a class="dropdown-item" href="<?php echo e(route('adminDashboard')); ?>"> 
                        <i class="fa fa-cog fa-fw" aria-hidden="true"></i>&nbsp;Administration
                      </a>
                      
                      <?php endif; ?> -->

                      <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                          onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out fa-fw"></i>&nbsp;Se déconnecter
                      </a>
                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                      </form>
                    </li>
                  </ul>
                </li>
              <?php endif; ?>   
            </li>
          </ul>
        </div>
      </div>
    </nav>



    <?php echo $__env->yieldContent('content'); ?>


    <!-- Bootstrap core JavaScript -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <!-- <script src="vendor/scrollreveal/scrollreveal.min.js"></script> --> 
    <!-- <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-creative/3.3.7/js/creative.min.js"></script>

    <script src="js/creative.min.js"></script>

    <script type="text/javascript" src="<?php echo e(URL::asset('js/creative.min.js')); ?>"></script>
    <script type="text/javascript" src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

  </body>

</html>