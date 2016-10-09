<?php 

include_once 'emprestar.php';

$emprestimos = new Emprestar();

switch($_GET['acao']){

	case 'pegarId':
		$resultado = $emprestimos->carregarPorId($_GET['id_cliente']);
	
		break;

	case 'ativar':
		$resultado = $emprestimos->ativar($_GET['id_cliente']);
		break;

		case 'emprestar':
		$resultado = $emprestimos->cadastrar($_POST);
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

