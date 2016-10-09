<?php

include_once 'cadastro.php';

$cliente = new Clientes();

switch($_GET['acao']){
    case 'salvar':

        if(empty($_POST['id_cliente'])){
            $resultado = $cliente->inserir($_POST);
        } else {
            $resultado = $cliente->alterar($_POST);
        }

        break;

    case 'excluir':
        $resultado = $cliente->excluir($_GET['id_cliente']);
        break;

    case 'desativar':
        $resultado = $cliente->desativar($_GET['id_cliente']);
        break;

     case 'ativar':
        $resultado = $cliente->ativar($_GET['id_cliente']);
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
    window.location.href = 'javascript:history.back()';
</script>
