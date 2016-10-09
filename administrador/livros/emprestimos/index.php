<?php
include_once 'emprestimos.php';

$emprestimos = new Emprestimos();
$emprestimos = $emprestimos->recuperarTodos();
?>

<?php  include_once '../../cabecalho.php'; ?>
<?php  include_once '../../cadastros/permissoes.php'; ?>

<?php
if (isset($_SESSION['nome'])){
   echo' <div><h1>Bem vindo  '. $_SESSION['nome'] .'!</h1></div>';
}
?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            Livros emprestados:
        </div>
        <div class="panel-body">

            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <td>Ações</td>
                    <td>Nome do livro</td>
                    <td>Nome da pessoa</td>
                    <td>Data do emprestimo</td>
                    <td>Data da devolução</td>

                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td>Ações</td>
                    <td>Nome do livro</td>
                    <td>Nome da pessoa</td>
                    <td>Data do emprestimo</td>
                    <td>Data da devolução</td>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach($emprestimos as $dado) { ?>

                    <tr>
                        <td>
                            <a class="btn btn-success" title="Devolver" href="processamento.php?acao=devolver&id_livros=<?php echo $dado['id_livros'];?>">Devolver
                                <span class="glyphicon glyphicon-bell"></span>
                            </a>

                        </td>
                        <td><?php echo $dado['nome']; ?></td>
                        <td><?php echo $dado['pessoa']; ?></td>
                        <td><?php echo $dado['data1']; ?></td>
                        <td><?php echo $dado['data2']; ?></td>
                    </tr>


                <?php } ?>

                </tbody>




            </table>
        </div>
    </div>

<?php  include_once '../../rodape.php'; ?>