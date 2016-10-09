<?php
include_once 'cadastro.php';

$usuario = new Usuarios();

if(!empty($_GET['id_usuario'])){
    $usuario->carregarPorId($_GET['id_usuario']);
}
?>
<?php include_once '../../cabecalho.php' ?>



    <br><br>

    <div id="resultado" class="alert alert-info"></div>

    <div class="row centered-form">
        <div class="col-xs-10 ">

    <div class="panel panel-default" id="painel">
        <div class="panel-heading">
            <h3 class="panel-title">Cadastre-se</h3>
        </div>
        <div class="panel-body">

        <form action="processamento.php?acao=salvar" method="post" name="formulario" id="form" class="form-horizontal">
            <?php
            echo '<input type="hidden" name="id_usuario" id="id_usuario"  value="'. $usuario->getIdUsuario() .'" />'
            ?>
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $usuario->getNome();?>" required="" autofocus/>
                </div>
            </div>

            <div class="form-group">
                <label for="sobrenome" class="col-sm-2 control-label">Sobrenome: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="sobrenome" id="sobrenome" value="<?php echo $usuario->getSobrenome();?>" required=""/>
                </div>
            </div>

            <div class="form-group">
                <label for="usuario" class="col-sm-2 control-label">Usuario: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="usuario" id="usuario" value="<?php echo $usuario->getUsuario();?>" required=""/>
                </div>
            </div>

            <div class="form-group">
                <label for="senha" class="col-sm-2 control-label">Senha: </label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="senha" id="senha" value="<?php echo $usuario->getSenha();?>" required=""/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="selectbasic">Nivel de usuario:</label>
                <div class="col-md-6">
                    <select id="nivel" name="nivel" class="form-control" required="">
                        <option value="">Selecione:</option>
                        <option value="1" <?=($usuario->getNivel() == '1')?'selected':''?> >Administrador</option>
                        <option value="0" <?=($usuario->getNivel() == '0')?'selected':''?> >Funcionario</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="selectbasic">Status:</label>
                <div class="col-md-6">
                    <select id="status" name="status" class="form-control" required="">
                        <option value="">Selecione:</option>
                        <option value="0" <?=($usuario->getStatus() == '0')?'selected':''?> >Desativado</option>
                        <option value="1" <?=($usuario->getStatus() == '1')?'selected':''?> >Ativado</option>
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

            <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

            <script type="text/javascript">
                $(function(){ // declaro o início do jquery
                    $("input[name='usuario'").on('blur', function(){
                        var usuario = $(this).val();
                        $.get('validacao.php?usuario=' + usuario, function(data){
                            $('#resultado').html(data);
                        });
                    });
                    });

            </script>
</div>
</div>
<?php  include_once '../../rodape.php'; ?>