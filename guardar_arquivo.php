<?php
require("dbconnect.inc.php");


$arquivo = $_FILES['arquivo']['tmp_name'];

$titulo = $_POST['titulo'];

if($arquivo != "none"){
    $fp = fopen($arquivo, "rb");
    $conteudo = fread($fp, $tamanho);
    $conteudo = addslashes($conteudo);
    $fclose($fp);

    $qry = "INSERT INTO arquivos VALUES(0, '$nome','$titulo','$conteudo', '$tipo')";

    mysql_query($qry);

    if (mysql_affected_rows($conn) > 0){
        print "O arquivo foi gravado no banco de dados.";
    }else{
        print "Nao foi possivel gravar o arquivo";
    }


}



?>