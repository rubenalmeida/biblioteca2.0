<?php
header("Content-Type: text/html; charset=UTF-8");

include_once '../../conex2.php';



if (isset($_GET['nome'])){

    $nome = $_GET['nome'];

    $sql = "SELECT * FROM cliente WHERE nome = '$nome' ";
    $query = mysqli_query($con, $sql );


    if( $query->num_rows > 0 ) {//se retornar algum resultado
        echo '<h4>'.'<b>'.'Cliente Já cadastrado!'.'</b>'.'</h4>';
    }

}

if (isset($_GET['usuarioLogin'])) {

    $usuarioLogin = $_GET['usuarioLogin'];

    $sql2 = "SELECT * FROM usuario WHERE usuario = '$usuarioLogin'";
    $query = mysqli_query($con, $sql2);

    if ($query->num_rows == 0) {//se retornar algum resultado
        echo '<h4>' . '<b>' . 'Usuário não existe!' . '</b>' . '</h4>';

    }
}

