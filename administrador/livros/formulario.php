<?php
include_once 'livros.php';

$livros = new Livros();

if(!empty($_GET['id_livros'])){
	$livros->carregarPorId($_GET['id_livros']);
}
?>
<?php  include_once '../cabecalho.php'; ?>
	
	<div class="panel panel-primary">
    	<div class="panel-heading">
			Livros
    	</div>
    	<div class="panel-body">
	    	<form action="processamento.php?acao=salvar" method="post" name="formulario" class="form-horizontal">
				<input type="hidden" name="id_livros" id="id_livros"  value="<?php echo $livros->getIdLivros();?>" />
	    	
				<div class="form-group">
                	<label for="nome" class="col-sm-2 control-label">Nome: </label>
                    <div class="col-sm-10">
                    	<input type="text" class="form-control" name="nome" id="nome" value="<?php echo $livros->getNome(); ?>" />
                    </div>
				</div>

				<div class="form-group">
                	<label for="nome" class="col-sm-2 control-label">Autor: </label>
                    <div class="col-sm-10">
                    	<input type="text" class="form-control" name="autor" id="autor" value="<?php echo $livros->getAutor(); ?>" />
                    </div>
				</div>
					
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    	<a href="index.php" class="btn btn-danger">Voltar</a>
                	</div>
				</div>				
				
	    	</form>
    	</div>
   	</div>
<?php include_once '../rodape.php'; ?>