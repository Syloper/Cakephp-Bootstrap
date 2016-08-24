<?php $usuario = $this->request->session()->read('Auth.User'); ?>
<!DOCTYPE html>
<html>
    <head>

      <?= $this->Html->charset() ?>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <title>Admin - <?= $this->fetch('title') ?></title>
      <?= $this->Html->meta('icon') ?>
      
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      

      <?= $this->Html->css('bootstrap.min.css') ?>
      <?= $this->Html->css('/plugins/iCheck/flat/blue.css') ?>
      
      <?= $this->Html->css('/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>
      <?= $this->Html->css('/plugins/datepicker/datepicker3.css') ?>
      <?= $this->Html->css('/plugins/datetimepicker/bootstrap-datetimepicker.min.css') ?>
      <?= $this->Html->css('/plugins/daterangepicker/daterangepicker-bs3.css') ?>
      <?= $this->Html->css('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>
      <?= $this->Html->css('/plugins/select2/select2.min.css') ?>
      <?= $this->Html->css('AdminLTE.css') ?>
      <?= $this->Html->css('skins/'.COLOR.'.min') ?>

      <?= $this->Html->script('/plugins/jQuery/jQuery-2.1.4.min.js') ?>
      <?= $this->Html->script('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') ?>
      <?= $this->Html->script('bootstrap.min.js') ?>
      <?= $this->Html->script('/plugins/datepicker/bootstrap-datepicker.js') ?>
      <?= $this->Html->script('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>
      <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') ?>
      <?= $this->Html->script('/plugins/input-mask/jquery.inputmask.js') ?>
      <?= $this->Html->script('/plugins/input-mask/jquery.inputmask.date.extensions.js') ?>
      <?= $this->Html->script('/plugins/input-mask/jquery.inputmask.extensions.js') ?>

      <?= $this->Html->script('http://maps.googleapis.com/maps/api/js?sensor=false') ?>
      <?php //$this->Html->script('/plugins/latlon-picker/jquery-gmaps-latlon-picker.js') ?>
            
      <?= $this->Html->script('/plugins/sparkline/jquery.sparkline.min.js') ?>
      <?= $this->Html->script('/plugins/knob/jquery.knob.js') ?>
      <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js') ?>
      <?= $this->Html->script('/plugins/daterangepicker/daterangepicker.js') ?>
      <?= $this->Html->script('/plugins/slimScroll/jquery.slimscroll.min.js') ?>
      <?= $this->Html->script('/plugins/fastclick/fastclick.min.js') ?>
      <?= $this->Html->script('/plugins/select2/select2.full.min.js') ?>
      <?= $this->Html->script('preImagen.js') ?>
      <?= $this->Html->script('app.min.js') ?>

      <?= $this->fetch('script') ?>
      <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
      <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

      <?= $this->fetch('meta') ?>
      <?= $this->fetch('css') ?>

    </head>
    <body class="hold-transition <?= COLOR ?> sidebar-mini">
        
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="./" class="logo">
                    <!-- mini logo 50x50 -->
                    <span class="logo-mini"><b><?php echo substr(APPNAME, 0, 1); ?></b></span>
                    <!-- logo regular -->
                    <span class="logo-lg"><?= APPNAME ?></span>
                </a>

                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                <?= $this->Html->link("<i class='fa fa-gears'></i>", ['controller' => 'Users' ,'action' => 'configuracion', 'plugin' => null], ['escapeTitle' => false]) ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

          <aside class="main-sidebar">

            <section class="sidebar">

              <div class="user-panel">
                <div class="pull-left image">
                  <?php echo $this->Html->image('perfiles/'.$usuario['imagen'], ['alt' => 'Imagen de usuario | '.$usuario["nombre"].' '.$usuario["apellido"].'', 'class' => 'img-circle']); ?>
                </div>
                <div class="pull-left info">
                  <p><?= $usuario['nombre'] ?> <?= $usuario['apellido'] ?></p>
                </div>
              </div>

              <?php echo $this->Form->create(null, ['url' => ['controller' => 'Pages' ,'action' => 'buscar'], 'class' => 'sidebar-form' ]); ?>

              <!-- <form action="#" method="get" class=""> -->
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Buscar...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              <!-- </form> -->

              <?php echo $this->Form->end(); ?>

              <ul class="sidebar-menu">
                <li class="header">NAVEGACIÓN</li>
                
                <li><?= $this->Html->link("<i class='fa fa-tachometer'></i> <span>Dashboard</span>", ['controller' => 'Pages' ,'action' => 'dashboard'], ['escapeTitle' => false]) ?></li>

                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-users"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li> <?= $this->Html->link("<i class='fa fa-circle-o'></i> Nuevo usuario", ['controller' => 'Users' ,'action' => 'agregar'], ['escapeTitle' => false]) ?> </li>
                    <li><?= $this->Html->link("<i class='fa fa-circle-o'></i> Listado de usuarios", ['controller' => 'Users', 'action' => 'index'],['escapeTitle' => false]) ?></li>
                  </ul>
                </li>

                <!-- <li class="header">LABELS</li> -->
                <li>
                  <?php echo $this->Html->link(
                      '<i class="fa fa-close text-red"></i> <span>Cerrar sesión</span>',
                      ['controller' => 'Users', 'action' => 'logout'],
                      ['confirm' => 'Seguro que deseas cerrar sesión ?', 'escapeTitle' => false]
                  ); ?>
                </li>
                

              </ul>
            </section>
          </aside>

          <div class="content-wrapper">
            <!-- <section class="content-header"> 
              <h1> Dashboard <small>Panel de control</small> </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
              </ol>
            </section> -->

            <section class="content">
              <?= $this->Flash->render() ?>
              <?= $this->fetch('content') ?>
            </section>
          </div>

          <footer class="main-footer">
            <strong><?php echo date('Y'); ?> - <a href="#"><?= APPNAME ?></a>.</strong>
            <div class="pull-right hidden-xs">
              <a href="http://syloper.com/" target="_blank"><b>Syloper</b></a>
            </div>
          </footer>

    </div>
       

     

      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      
      <script>
        $(function () {

          $(".select2").select2();
          $('.datetimepicker1').datetimepicker();


          /* Resalta de Rojo un error en input */
          if($(".input").hasClass("error")){
            $(".error").parent().parent().addClass('has-error');
            $(".error-message").css('color', '#dd4b39');
          }

        });
      </script>
    </body>
</html>
