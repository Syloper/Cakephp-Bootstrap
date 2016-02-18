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
      <?= $this->Html->css('/plugins/daterangepicker/daterangepicker-bs3.css') ?>
      <?= $this->Html->css('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>
      <?= $this->Html->css('/plugins/select2/select2.min.css') ?>
      <?= $this->Html->css('AdminLTE.css') ?>
      <?= $this->Html->css('skins/skin-purple.min') ?>

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
      <?= $this->Html->script('/plugins/latlon-picker/jquery-gmaps-latlon-picker.js') ?>
            
      <?= $this->Html->script('/plugins/sparkline/jquery.sparkline.min.js') ?>
      <?= $this->Html->script('/plugins/knob/jquery.knob.js') ?>
      <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js') ?>
      <?= $this->Html->script('/plugins/daterangepicker/daterangepicker.js') ?>
      <?= $this->Html->script('/plugins/slimScroll/jquery.slimscroll.min.js') ?>
      <?= $this->Html->script('/plugins/fastclick/fastclick.min.js') ?>
      <?= $this->Html->script('/plugins/select2/select2.full.min.js') ?>
      <?= $this->Html->script('app.min.js') ?>

      <?= $this->fetch('script') ?>

      <?= $this->fetch('meta') ?>
      <?= $this->fetch('css') ?>

    </head>
    <body class="hold-transition skin-purple sidebar-mini">
        
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="./" class="logo">
                    <!-- mini logo 50x50 -->
                    <span class="logo-mini"><b>CB</b></span>
                    <!-- logo regular -->
                    <span class="logo-lg">Cakephp Bootstrap</span>
                </a>

                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li>
                                
                                <?= $this->Html->link("<i class='fa fa-gears'></i>", ['controller' => 'Users' ,'action' => 'configuracion'], ['escapeTitle' => false]) ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

          <aside class="main-sidebar">

            <section class="sidebar">

              <div class="user-panel">
                <div class="pull-left image">
                  <?php echo $this->Html->image('lemmy.jpg', ['alt' => 'Imagen de usuario', 'class' => 'img-circle']); ?>
                </div>
                <div class="pull-left info">
                  <p>Lemmy Kilmister</p>
                </div>
              </div>

              <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Buscar...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                  </span>
                </div>
              </form>

              <ul class="sidebar-menu">
                <li class="header">NAVEGACIÓN</li>
                
                <li><?= $this->Html->link("<i class='fa fa-tachometer'></i> <span>Dashboard</span>", ['controller' => 'Pages' ,'action' => 'dashboard'], ['escapeTitle' => false]) ?></li>

                <!-- <li class="treeview active">
                  <a href="#">
                    <i class="fa fa-home"></i> <span>Negocios</span> <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li> <?= $this->Html->link("<i class='fa fa-circle-o'></i> Nuevo negocio", ['controller' => 'Negocios' ,'action' => 'add'], ['escapeTitle' => false]) ?> </li>
                    
                    <li>
                      <?= $this->Html->link("<i class='fa fa-circle-o'></i> Listado de negocios", ['controller' => 'Negocios', 'action' => 'index'], ['escapeTitle' => false]) ?>
                    </li>
                  </ul>
                </li> -->

                <!-- <li class="header">LABELS</li> -->
                <li>
                  <!-- <a href="#"><i class="fa fa-close text-red"></i> <span>Cerrar sesión</span></a> -->
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
            <div class="pull-right hidden-xs">
              <a href="http://syloper.com/" target="_blank"><b>Syloper</b></a>
            </div>
            <strong>Copyright &copy; 2016 <a href="#">Aimant</a>.</strong> Todos los derechos reservados.
          </footer>

    </div>
       

     

      <script>
        $.widget.bridge('uibutton', $.ui.button);
      </script>
      
      <script>
            $(function () {

              $(".select2").select2();

            });
      </script>
    </body>
</html>
