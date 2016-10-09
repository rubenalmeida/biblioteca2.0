<?php
include_once 'livros.php';

$livros = new Livros();
$livros = $livros->recuperarTodos();
?>
<?php  include_once '../cabecalho.php'; ?>
<?php  include_once '../cadastros/permissoes.php'; ?>


	<div class="panel panel-primary">
		<div class="panel-heading">
			Livros
		</div>
		<div class="panel-body">

			<a href="formulario.php" class="btn btn-warning">Cadastrar novo livro</a>
			<br>
			<br>

			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
				<tr>
					<td>Ações</td>
					<td>Id</td>
					<td>Nome</td>
					<td>Autor</td>
				</tr>
				</thead>
				<tfoot>
				<tr>
					<td>Ações</td>
					<td>Id</td>
					<td>Nome</td>
					<td>Autor</td>

				</tr>
				</tfoot>
				<tbody>

				<?php foreach($livros as $dado) {
					if (isset($_SESSION['nivel']) && $_SESSION['nivel'] > 0){
						echo  '<tr>
						<td>
							<a class="btn btn-danger" title="Excluir" href="processamento.php?acao=excluir&id_livros=' . $dado['id_livros'] . '">
								<span class="glyphicon glyphicon-trash"></span>
							</a>'.

							'<a class="btn btn-success" title="Alterar" href="formulario.php?id_livros='  .$dado['id_livros'] . '">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>'.

							'<a class="btn btn-primary" title="Emprestar" href="FormEmprestimo.php?id_livros= ' . $dado['id_livros'] .'">
								<span class="glyphicon glyphicon-book"></span>
							</a>' .
						'</td>
						<td>' . $dado['id_livros'] . '</td>
						<td>' . $dado['nome'] . '</td>
						<td>' . $dado['autor'] . '</td>
					</tr>';
					}else{
						echo

						'<tr>
						<td>
							
							<a class="btn btn-primary" title="Emprestar" href="FormEmprestimo.php?id_livros=' . $dado['id_livros'] . '">
								Emprestar  <span class="glyphicon glyphicon-book"></span>
							</a>
						</td>' .
						'<td>' . $dado['id_livros'] . '</td>
						<td>' . $dado['nome'] . '</td>
						<td>' . $dado['autor']. '</td>
						</tr>';
					}

					?>



				<?php } ?>
				</tbody>

			</table>
		</div>
	</div>
<?php  include_once '../rodape.php'; ?>