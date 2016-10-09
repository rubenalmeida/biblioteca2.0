<?php
header("Content-Type: text/html; charset=UTF-8");

include_once '../Conexao2.php';



if (isset($_GET['usuario'])){

    $usuario = $_GET['usuario'];

    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' ";
    $conexao = new Conexao();
    $resultado = $conexao->executar($sql);


    if( $resultado->num_rows > 0 ) {//se retornar algum resultado
        echo '
        <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Ops!</h4>
        Parece que já existe um usuario com mesmo nome. Tente outro! 
              </div>';

    }

}

if (isset($_GET['usuarioLogin'])) {

    $usuarioLogin = $_GET['usuarioLogin'];

    $sql2 = "SELECT * FROM usuario WHERE usuario = '$usuarioLogin'";

    $conexao = new Conexao();
    $resultado2 = $conexao->executar($sql2);

    if ($resultado2->num_rows == 0) {//se retornar algum resultado
        echo '
        <div class="box-body animated shake">
        <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Ops!</h4>
                    Este nome de usuario que você tentou logar não existe, ou está desativado.
         </div>
         </div>';

    }
}

