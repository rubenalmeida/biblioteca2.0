<?php

include_once '../conexao.php';

 if(!isset($_SESSION)){
     session_start();
 }

$usuarioLogin = $_POST['usuarioLogin'];
$senha = $_POST['senha'];


$sql = "SELECT * FROM usuario WHERE usuario = '$usuarioLogin' AND senha = '$senha'  AND status = '1'";
$conexao = new Conexao();
$query = $conexao->recuperarTodos($sql);

if (count($query)) {

    $_SESSION['id_usuario'] = $query[0]['id_usuario'];
    $_SESSION['usuario'] = $query[0]['usuario'];
    $_SESSION['nome'] = $query[0]['nome'];
    $_SESSION['senha'] = $query[0]['senha'];
    $_SESSION['nivel'] = $query[0]['nivel'];
    $_SESSION['status'] = $query[0]['status'];
    $_SESSION['extensao'] = $query[0]['extensao'];



    if($_SESSION['status'] == 1){
        header("Location: http://localhost/biblioteca/index.php");
    }

}else{

    session_destroy();
    $mensagem = 'Login incorreto ou usuario desativado!';
}


?>



<script>
    alert('<?php echo $mensagem; ?>');
    window.location.href = 'http://localhost/biblioteca/login.php';
</script>





