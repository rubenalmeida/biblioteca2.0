<?php
include_once 'cadastro.php';

$cliente= new Clientes();

if(!empty($_GET['id_cliente'])){
    $cliente->carregarPorId($_GET['id_cliente']);
}
?>
<?php include_once '../../cabecalho.php' ?>
    <script type="text/javascript" language="javascript" src="../../js/jquery-2.1.1.js"></script>

 <script type="text/javascript" language="javascript" src="../../js/jquery.maskedinput.min.js"></script>

<?php  include_once '../permissoes.php'; ?>


    <br><br>

    <div id="resultado" class="alert"></div>

    <div class="row centered-form">
    <div class="col-xs-10 ">

    <div class="panel panel-default" id="painel">
        <div class="panel-heading">
            <h3 class="panel-title">Cadastrar cliente</h3>
        </div>
        <div class="panel-body">

            <form action="processamento.php?acao=salvar" method="post" name="formulario" id="form" class="form-horizontal">
                <input type="hidden" name="id_cliente" id="id_cliente"  value="<?php echo $cliente->getIdCliente();?>" required=""/>

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $cliente->getNome();?>" required="" AUTOFOCUS/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="sexo">Sexo:</label>
                    <div class="col-md-6">
                        <select id="sexo" name="sexo" class="form-control" required="">
                            <option value="">Selecione:</option>
                            <option value="feminino" <?=($cliente->getSexo() == 'feminino')?'selected':''?> >Feminino</option>
                            <option value="masculino" <?=($cliente->getSexo() == 'masculino')?'selected':''?> >Masculino</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="telefone" class="col-sm-2 control-label">Telefone: </label>
                    <div class="col-sm-6">
                        <input type="te" class="form-control" name="telefone" id="telefone" value="<?php echo $cliente->getTelefone();?>" required=""/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="endereco" class="col-sm-2 control-label">Endereco: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $cliente->getEndereco();?>" required=""/>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label" for="selectbasic">Status:</label>
                    <div class="col-md-6">
                        <select id="status" name="status" class="form-control" required="">
                            <option value="">Selecione:</option>
                            <option value="0" <?=($cliente->getStatus() == '0')?'selected':''?> >Desativado</option>
                            <option value="1" <?=($cliente->getStatus() == '1')?'selected':''?> >Ativado</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <a href="../index.php" class="btn btn-danger">Voltar</a>
                    </div>
                </div>


            </form>



            <script type="text/javascript">
                $(function() {
                    $("#telefone").mask("99999-9999");

                });
            </script>

            <script type="text/javascript">
                $(function(){ // declaro o início do jquery
                    $("input[name='nome'").on('blur', function(){
                        var nome = $(this).val();
                        $.get('validacao.php?nome=' + nome, function(data){
                            $('#resultado').html(data);
                        });
                    });
                });

            </script>
        </div>
    </div>
<?php  include_once '../../rodape.php'; ?>