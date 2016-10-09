<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 06/10/2016
 * Time: 18:35
 */

include_once 'conexao.php';


if (!empty($_GET['acao']) && $_GET['acao'] == 'verificarLivro'){

    $nome = $_GET['nome'];
    $sql = "select * from livros where nome = '$nome'";

    $conexao = new Conexao();
    $livros = $conexao->recuperarTodos($sql);

    if(count($livros)){
        echo '<p class="animated shake"> O Livro  ' .  $nome . '  ja esta cadastrado</p>';
    }
    die;

}

if (!empty($_GET['acao']) && $_GET['acao'] == 'verificarAutor'){

    $nome = $_GET['nome'];
    $sql = "select * from autor where nome = '$nome'";

    $conexao = new Conexao();
    $autor = $conexao->recuperarTodos($sql);

    if(count($autor)){
        echo '<p class="animated shake"> O Autor  ' .  $nome . '  ja esta cadastrado</p>';
    }
    die;

}

if (!empty($_GET['acao']) && $_GET['acao'] == 'verificarEditora'){

    $nome = $_GET['nome'];
    $sql = "select * from editora where nome = '$nome'";

    $conexao = new Conexao();
    $editora = $conexao->recuperarTodos($sql);

    if(count($editora)){
        echo '<p class="animated shake"> A editora  ' .  $nome . '  ja é cadastrada</p>';
    }
    die;

}