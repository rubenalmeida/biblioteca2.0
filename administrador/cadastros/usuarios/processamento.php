<?php

include_once 'cadastro.php';

$usuario = new Usuarios();

switch($_GET['acao']){
    case 'salvar':

        if(empty($_POST['id_usuario'])){
            $resultado = $usuario->inserir($_POST);
        } else {
            $resultado = $usuario->alterar($_POST);
        }

        break;


    case 'desativar':
        $resultado = $usuario->desativar($_GET['id_usuario']);
        break;


    case 'ativar':
        $resultado = $usuario->ativar($_GET['id_usuario']);
        break;
}

if($resultado){
    $mensagem = 'Concluido!';
} else {
    $mensagem = 'Ocorreu um erro! Tente novamente.';
}

?>

<script>
    alert('<?php echo $mensagem; ?>');
    window.location.href = 'http://soundbeats.azurewebsites.net/login.php';
</script>
