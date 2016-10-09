<?php
include_once '../livros.php';

$livros = new Livros();

if(!empty($_GET['id_livros'])){
    $livros->carregarPorId($_GET['id_livros']);

    include_once '../../cadastros/clientes/cadastro.php';
        $cliente = new Clientes();
        $cliente->recuperarTodosAtivos();

}
?>
<?php  include_once '../../cabecalho.php'; ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            Emprestimo
        </div>
        <div class="panel-body">

            <form action="../processamento.php?acao=emprestar" method="post" name="formulario" class="form-horizontal">
                <input type="hidden" name="emprestado" id="emprestado" value="1" />

                <input type="hidden" name="id_livros" id="id_livros"  value="<?php echo $livros->getIdLivros();?>" />

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $livros->getNome(); ?>" readonly/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Autor: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="autor" id="autor" value="<?php echo $livros->getAutor(); ?>" readonly/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="selectbasic">Cliente:</label>
                    <div class="col-md-3">
                        <select id="cliente" name="cliente" class="form-control" required="">
                            <option value="null" selected >Selecione:</option>
                            <?php foreach ($cliente as $dados){ ?>
                            <option value="<?php echo $dados['id_cliente'] ?>"><?php echo $dados['nome'] ?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="data1" class="col-sm-2 control-label">EM: </label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" name="data1" id="data1" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="data2" class="col-sm-2 control-label">Devolver dia: </label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" name="data2" id="data2" />
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Emprestar</button>
                        <a href="../index.php" class="btn btn-danger">Voltar</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
<?php include_once '../../rodape.php'; ?>