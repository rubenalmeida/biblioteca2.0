<?php
include_once 'cadastro.php';

$usuario = new Usuarios();


if(!empty($_GET['id_usuario'])){
  $usuario->carregarPorId($_GET['id_usuario']);
}



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="../../../bootstrap/css/animate.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box ">
  <div class="register-logo animated tada">
    <a href="##########"><b>Biblioteca </b>ADOA</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registrar novo usuário</p>

    <form action="processamento.php?acao=salvar" method="post" enctype="multipart/form-data" >
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $usuario->getNome();?>" required="" autofocus placeholder="Seu nome"/>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $usuario->getUsuario();?>" required="" placeholder="Seu nome de usuario"/>
        <span class="glyphicon glyphicon-sunglasses form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control"  name="senha" id="senha" placeholder="senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Reescreva sua senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div id="confirma"></div>

      <div class="form-group has-feedback">
        <label  for="selectbasic">Nivel de usuario:</label>
          <select class="form-control" id="nivel" name="nivel" required="">
            <option value="">Selecione:</option>
            <option value="1" <?=($usuario->getNivel() == '1')?'selected':''?> >Administrador</option>
            <option value="0" <?=($usuario->getNivel() == '0')?'selected':''?> >Funcionario</option>
          </select>
        </div>

     <div class="form-group has-feedback">
       <label  for="selectbasic">Status:</label>
          <select class="form-control" id="status" name="status"  required="">
            <option value="">Selecione:</option>
            <option value="0" <?=($usuario->getStatus() == '0')?'selected':''?> >Desativado</option>
            <option value="1" <?=($usuario->getStatus() == '1')?'selected':''?> >Ativado</option>
          </select>
        </div>


      <div class="form-group has-feedback">
        <input type="file" name="foto" id="foto" class="form-control" >
        <span class="glyphicon glyphicon-camera form-control-feedback"></span>
      </div>




      <div class="row">

        <!-- /.col -->
        <div class="col-xl-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Registre-se</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <a href="../../../login.php" class="text-center">Eu já sou cadastrado.</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
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
