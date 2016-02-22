<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('icon') ?>
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        
        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('AdminLTE.css') ?>
        <?= $this->Html->css('skins/'.COLOR.'.min') ?>
        <?= $this->Html->css('/plugins/iCheck/square/blue.css') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>

    </head>
    <body class="hold-transition <?= COLOR ?> login-page">
    
    <?= $this->fetch('content') ?>

    <?= $this->Html->script('/plugins/jQuery/jQuery-2.1.4.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('/plugins/iCheck/icheck.min.js') ?>

    <?= $this->fetch('script') ?>

    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>