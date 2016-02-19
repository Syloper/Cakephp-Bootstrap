<?php 

    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $paso = 0;

    if (!empty($_POST['tipo'])) {
        
        switch ($_POST['tipo']) {
            case 'database':
                //$conexion = @mysql_connect($_POST['host'], $_POST['usuario'], $_POST['password']);
                //$mysqli = new mysqli("ejemplo.com", "usuario", "contraseña", "basedatos");
                $conexion = new mysqli($_POST['host'], $_POST['usuario'], $_POST['password'], $_POST['database']);
                if(!$conexion->connect_errno){
                    $query = "
                        CREATE TABLE IF NOT EXISTS users (
                            id int(11) NOT NULL AUTO_INCREMENT, 
                            email varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                            password varchar(255) NOT NULL,
                            created DATETIME NOT NULL,
                            modified DATETIME NOT NULL,
                            PRIMARY KEY (id)
                        )
                    ";

                    $insert = "
                        INSERT INTO users (`id`, `email`, `password`, `created`, `modified`) VALUES
                        (1, 'usuario@correo.com', '$2y$10$0FbtTgF48HwB/q4PCEWk/eyMLXnLBGK80gtxkSvx/NPINosRvPoRy', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')
                    ";

                    if (!$conexion->query($query)) {
                        $error = "No se pudo crear la DB nueva.";
                    }else{
                        if (!$conexion->query($insert)) {
                            $error = "No se pudieron ingresar los valores.";  
                        }
                        $suceso = "La tabla se creo correctamente.";
                        $config = fopen(dirname(__DIR__) . '/config/conexiones.php', "w") or die("Unable to open file!");
                        $info = '<?php $conexiones = array("host" => "'.$_POST['host'].'", "user" => "'.$_POST['usuario'].'", "pass" => "'.$_POST['password'].'", "base" => "'.$_POST['database'].'"); ?>';
                        fwrite($config, $info);
                        fclose($config);
                        $paso = 1;
                    }

                }else{
                    $error = "No se pudo conectar a la base de datos. Los datos son correctos ?";
                }
            break;

            case 'finalizar':
                unlink(dirname(__DIR__) . '/instalador/instalador.ins');
                header("Location: index.php");
            break;
        }

    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Instalador Cakephp Bootstrap</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="webroot/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="webroot/css/AdminLTE.min.css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <?php if (!empty($error)): ?>
                        
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    <?= $error ?>
                </div>

            <?php endif; ?>

            <?php if (!empty($suceso)): ?>
                        
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Genial!</h4>
                    <?= $suceso;  ?>
                </div>

            <?php endif; ?>

            <div class="login-logo">
                <b>Instalador de</b> <br>Cakephp Bootstrap
            </div>


            <?php if ($paso == 0): ?>

                <div class="login-box-body">

                    <p>Como primera medida deberías crear una base de datos desde phpmyadmin despues por favor completa los siguientes campos.</p>

                    <form action="" method="post">
                        <input name="tipo" value="database" type="hidden" >
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="host" placeholder="Host" value="localhost" required>
                            <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <input type="hidden" name="reloco" value="0"></input>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="database" placeholder="Base de datos" required>
                            <span class="glyphicon glyphicon-tasks form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Continuar</button>
                        </div>
                    </form>
                </div>

            <?php elseif ($paso == 1): ?>

                <div class="login-box-body">

                <?php if (is_writable(dirname(__DIR__) . '/tmp/') && is_writable(dirname(__DIR__) . '/logs/')): ?>
                    
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Genial!</h4>
                        Las carpetas <b>/tmp/</b> y <b>/logs/</b>, tienen permiso de escritura.
                    </div>

                    <form action="" method="post">
                        <input name="tipo" value="finalizar" type="hidden" >
                        <div class="form-group has-feedback">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Continuar</button>
                        </div>
                    </form>

                <?php else: ?>

                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        Las carpetas <b>/tmp/</b> y <b>/logs/</b>, deben tener permiso de escritura.
                    </div>

                    <form action="" method="post"></form>
                        <input name="tipo" value="actualizar" type="hidden" >
                        <div class="form-group has-feedback">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Actualizar</button>
                        </div>
                    </div>

                <?php endif; ?>

                </div>

            <?php endif; ?>


        </div>
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
