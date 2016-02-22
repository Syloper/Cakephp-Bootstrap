<?php 

    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $paso = 0;

    if (!empty($_POST['tipo'])) {
        
        switch ($_POST['tipo']) {
            case 'database':
                $conexion = new mysqli($_POST['host'], $_POST['usuario'], $_POST['password'], $_POST['database']);
                if(!$conexion->connect_errno){
                    $query = "
                        CREATE TABLE IF NOT EXISTS users (
                            id int(11) NOT NULL AUTO_INCREMENT, 
                            email varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
                            password varchar(255) NOT NULL,
                            nombre varchar(255) NOT NULL,
                            apellido varchar(255) NOT NULL,
                            imagen varchar(255) NOT NULL,
                            created DATETIME NOT NULL,
                            modified DATETIME NOT NULL,
                            PRIMARY KEY (id)
                        )
                    ";

                    $insert = "
                        INSERT INTO users (`id`, `email`, `password`, `nombre`, `apellido`, `imagen`, `created`, `modified`) VALUES
                        (1, 'usuario@correo.com', '$2y$10$0FbtTgF48HwB/q4PCEWk/eyMLXnLBGK80gtxkSvx/NPINosRvPoRy', 'Lemmy', 'Kilmister', 'lemmy.jpg', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')
                    ";

                    if (!$conexion->query($query)) {
                        $error = "No se pudo crear la DB nueva.";
                    }else{
                        if (!$conexion->query($insert)) {
                            $error = "No se pudieron ingresar los valores. (Esto puede ser porque la tabla ya contiene registros)";  
                        }
                        $suceso = "La tabla se creo correctamente.";
                        $config = fopen(dirname(__DIR__) . '/config/conexiones.php', "w");
                        if ($config) {
                            $info = '<?php $conexiones = array("host" => "'.$_POST['host'].'", "user" => "'.$_POST['usuario'].'", "pass" => "'.$_POST['password'].'", "base" => "'.$_POST['database'].'"); ?>';
                            fwrite($config, $info);
                            fclose($config);
                            $paso = 2;
                        }else{
                            $error = "No se pudo crear el archivo de configuración. Tiene la carpeta los permisos necesarios ?";
                        }
                    }

                }else{
                    $error = "No se pudo conectar a la base de datos. Los datos son correctos ?";
                }
            break;

            case 'configuracion':
                $config = fopen(dirname(__DIR__) . '/config/paths.php', "a");
                if ($config) {
                    $info  = "\n";
                    $info .= " /*Definiciones de configuracion de cakephp bootstrap*/ ";
                    $info .= "\n";
                    $info .= 'define("COLOR", "'.$_POST['color'].'");';
                    $info .= "\n";
                    $info .= 'define("APPNAME", "'.$_POST['nombreProyecto'].'");';
                    $info .= "\n";
                    fwrite($config, $info);
                    fclose($config);
                    $paso = 3;
                }
                break;

            case 'paso1':
                $paso = 1;
                break;

            case 'paso2':
                $paso = 2;
                break;

            case 'paso2':
                $paso = 3;
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
        <!-- Select2 -->
        <link rel="stylesheet" href="webroot/plugins/select2/select2.min.css">
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

                <?php if (is_writable(dirname(__DIR__) . '/tmp/') && is_writable(dirname(__DIR__) . '/logs/')): ?>
                    
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Genial!</h4>
                        Las carpetas <b>/tmp/</b> y <b>/logs/</b>, tienen permiso de escritura.
                    </div>

                    <form action="" method="post">
                        <input name="tipo" value="paso1" type="hidden" >
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
                        <input name="tipo" value="paso1" type="hidden" >
                        <div class="form-group has-feedback">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Actualizar</button>
                        </div>
                    </div>

                <?php endif; ?>

                </div>

            <?php elseif ($paso == 1): ?>

                <div class="login-box-body">

                    <p>Deberías crear una base de datos desde phpmyadmin despues por favor completa los siguientes campos.</p>

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

            <?php elseif($paso == 2): ?>                

                <div class="login-box-body">

                    <p>Completá los siguientes campos con información del proyecto.</p>

                    <form action="" method="post">
                        <input name="tipo" value="configuracion" type="hidden" >
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="nombreProyecto" placeholder="Nombre del proyecto" required>
                            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                        </div>
                        <div class="form-group">
                            <label>Color del proyecto</label>
                            <select name="color" class="form-control select2" style="width: 100%;">
                                <optgroup label="Dark">
                                    <option value="skin-blue" selected="selected">Azul</option>
                                    <option value="skin-black">Negro</option>
                                    <option value="skin-purple">Purpura</option>
                                    <option value="skin-green">Verde</option>
                                    <option value="skin-red">Rojo</option>
                                    <option value="skin-yellow">Amarillo</option>
                                </optgroup>
                                
                                <optgroup label="Light">
                                    <option value="skin-blue-light">Azul</option>
                                    <option value="skin-black-light">Negro</option>
                                    <option value="skin-purple-light">Purpura</option>
                                    <option value="skin-green-light">Verde</option>
                                    <option value="skin-red-light">Rojo</option>
                                    <option value="skin-yellow-light">Amarillo</option>
                                </optgroup>

                            </select>
                        </div>
                        
                        <div class="form-group has-feedback">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Continuar</button>
                        </div>
                    </form>
                </div>

            <?php elseif($paso == 3): ?>

                <div class="login-box-body">

                    <p>Felicitaciones, tu sistema está listo para ser usado. Apretá en finalizar para empezar a usarlo.</p>
                    <p>Se creo por defecto un usuario, sus datos son: <br><br> <b>Usuario</b> : usuario@correo.com <br> <b>Password</b> : contraseña</p>

                    <br>
                    <form action="" method="post">
                        <input name="tipo" value="finalizar" type="hidden" >
                        <div class="form-group has-feedback">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Finalizar</button>
                        </div>
                    </form>
                </div>

            <?php endif; ?>


        </div>
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
         <!-- Select2 -->
        <script src="plugins/select2/select2.full.min.js"></script>
        <script>
            $(function () {
                $(".select2").select2();
            });
        </script>
    </body>
</html>
