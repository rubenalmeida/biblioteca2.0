<doctype! html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Escolher arquivo</title>
</head>
<body>
<form enctype="multipart/form-data" action="guardar_arquivo.php" method="post">
    <label for="descricao" >Descrição</label><input type="text" name="titulo" size="30" id="descricao">
    <label for="arquivo" id="arquivo">Arquivo</label><input type="file" name="arquivo"><br>
    <input type="submit" value="Enviar Arquivo">


</form>


</body>
</html>