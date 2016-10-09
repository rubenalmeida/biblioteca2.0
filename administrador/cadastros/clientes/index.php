<?php
include_once 'cadastro.php';

$cliente = new Clientes();
$cliente = $cliente->recuperarTodos();
?>
<?php  include_once '../../cabecalho.php'; ?>

<?php
include '../permissoes.php';

?>


    <div class="panel panel-primary">
        <div class="panel-heading">
            Clientes
        </div>
        <div class="panel-body">

            <a href="FormCadastro.php" class="btn btn-warning">Cadastrar novo Cliente</a>
            <br>
            <br>

            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead class="fixed">
                <tr>
                    <td>Ações</td>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Sexo</td>
                    <td>Telefone</td>
                    <td>Endereco</td>
                    <td>Status</td>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td>Ações</td>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Sexo</td>
                    <td>Telefone</td>
                    <td>Endereco</td>
                    <td>Status</td>

                </tr>
                </tfoot>
                <tbody>

                <?php foreach($cliente as $dado) { ?>

                    <tr>
                        <td>
                            <a class="btn btn-danger" title="Desativar" href="usuarios/processamento.php?acao=desativar&id_cliente=<?php echo $dado['id_cliente']; ?>">
                                Desativar <span class="glyphicon glyphicon-off"></span>
                            </a>
                            <a class="btn btn-success" title="Ativar" href="usuarios/processamento.php?acao=ativar&id_cliente=<?php echo $dado['id_cliente']; ?>">
                                Ativar <span class="glyphicon glyphicon-off"></span>
                            </a>

                            <a class="btn btn-success" title="Alterar" href="FormCadastro.php?id_cliente=<?php echo $dado['id_cliente']; ?>">Alterar
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>


                        </td>
                        <td><?php echo $dado['id_cliente']; ?></td>
                        <td><?php echo $dado['nome']; ?></td>
                        <td><?php echo $dado['sexo']; ?></td>
                        <td><?php echo $dado['telefone']; ?></td>
                        <td><?php echo $dado['endereco']; ?></td>
                        <td><?php echo $dado['status']; ?></td>
                    </tr>

                <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
<?php  include_once '../../rodape.php'; ?>