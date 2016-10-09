<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Biblioteca Adoa| Area de trabalho</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="http://localhost/biblioteca/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="http://localhost/biblioteca/bootstrap/css/animate.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://localhost/biblioteca/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="http://localhost/biblioteca/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="http://localhost/biblioteca/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="http://localhost/biblioteca/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="http://localhost/biblioteca/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="http://localhost/biblioteca/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="http://localhost/biblioteca/plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="http://localhost/biblioteca/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="http://localhost/biblioteca/plugins/datatables/dataTables.bootstrap.css">

    <link rel="stylesheet" href="http://localhost/biblioteca/plugins/select2/select2.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="http://biblioteca" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><small><b>ADOA</b></small></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Biblioteca </b>Adoa</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!-- Notifications: style can be found in dropdown.less -->

                    <!-- USUARIO -->


                    <?php

                    if(!isset($_SESSION)){
                        session_start();
                    }

                    if (isset($_SESSION['usuario'])){

                        $usuario = $_SESSION['usuario'];
                        $extensao = $_SESSION['extensao'];

                        echo
                        '<li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="http://localhost/biblioteca/fotos/usuarios/'. $_SESSION['id_usuario'] . $extensao .'" class="user-image" alt="'. $usuario .'">
                            <span class="hidden-xs">' . $usuario . '</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                               <img src="http://localhost/biblioteca/fotos/usuarios/'. $_SESSION['id_usuario'] . $_SESSION['extensao'] .'" class="img-circle" alt="'. $usuario .'">

                                <p>' . $_SESSION['nome']  .

                        '</p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="">
                                    <a href="http://localhost/biblioteca/administrador/cadastros/usuarios/logout.php" class="btn btn-warning">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>';



                    }else{

                        header("Location: http://localhost/biblioteca/login.php");

                    }
                    ?>





                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <?php echo '<img src="http://localhost/biblioteca/fotos/usuarios/'. $_SESSION['id_usuario'] . $_SESSION['extensao'] . '" class="img-circle" alt="'. $usuario .'">'; ?>
                </div>
                <div class="pull-left info">
                    <p><? echo  $usuario; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">Navegação principal</li>

                <li>
                    <a href = "http://localhost/biblioteca/pages/forms/livrosDisponiveis.php" >
                        <i class="glyphicon glyphicon-book" ></i > <span > Livros Disponiveis </span >
                        <span class="pull-right-container" >
                                    <small class="glyphicon glyphicon-ok-sign" ></small >
                                </span >
                    </a >
                </li >

                <li>
                    <a href = "http://localhost/biblioteca/pages/forms/livrosEmprestados.php" >
                        <i class="glyphicon glyphicon-book" ></i > <span > Livros Emprestados </span >
                        <span class="pull-right-container" >
                                    <small class="glyphicon glyphicon-remove-sign" ></small >
                                </span >
                    </a >
                </li >


                <li>
                    <a href = "http://localhost/biblioteca/pages/forms/formCliente.php" >
                        <i class="glyphicon glyphicon-user" ></i > <span > Cadastrar Cliente </span >
                        <span class="pull-right-container" >
                                    <small class="glyphicon glyphicon-plus-sign" ></small >
                                </span >
                    </a >
                </li >



                <li>
                    <a href = "http://localhost/biblioteca/pages/forms/listaClientes.php" >
                        <i class="glyphicon glyphicon-user" ></i > <span > Clientes cadastrados </span >
                        <span class="pull-right-container" >
                                    <small class="glyphicon glyphicon-info-sign" ></small >
                                </span >
                    </a >
                </li >





                <?php if (isset($_SESSION['usuario']) && $_SESSION['nivel'] == 1 ) {


                    echo '
                        <li>
                            <a href = "http://localhost/biblioteca/administrador/cadastros/usuarios/registro.php" >
                                <i class="glyphicon glyphicon-user" ></i > <span > Cadastrar usuario </span >
                                <span class="pull-right-container" >
                                    <small class="glyphicon glyphicon-plus-sign" ></small >
                                </span >
                    </a >
                </li >';

               } ?>
                
                <li>
                    <a href="http://localhost/biblioteca/pages/forms/cadastroLivros.php ">
                        <i class="fa fa-th"></i> <span>Cadastrar novo livro</span>
                        <span class="pull-right-container">
              <small class="glyphicon glyphicon-plus-sign"></small>
            </span>
                    </a>
                </li>



            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
