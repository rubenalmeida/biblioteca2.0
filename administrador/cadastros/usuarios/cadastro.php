<?php
include_once '../conexao.php';

class Usuarios{
    protected $id_usuario;
    protected $nome;
    protected $sobrenome;
    protected $usuario;
    protected $senha;
    protected $nivel;
    protected $status;


    public function getIdUsuario()
    {
        return $this->id_usuario;
    }


    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public function getSobrenome()
    {
        return $this->sobrenome;
    }


    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }


    public function getUsuario()
    {
        return $this->usuario;
    }


    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }


    public function getSenha()
    {
        return $this->senha;
    }


    public function setSenha($senha)
    {
        $this->senha = $senha;
    }


    public function getNivel()
    {
        return $this->nivel;
    }


    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }


    public function getStatus()
    {
        return $this->status;
    }


    public function setStatus($status)
    {
        $this->status = $status;
    }



    function inserir($dados){
        $nome = $dados['nome'];
        $usuario = $dados['usuario'];
        $senha = $dados['senha'];
        $nivel = $dados['nivel'];
        $status = $dados['status'];

          


        if(!empty($_FILES) && $_FILES['foto']['error'] == 0){

            $nomeFoto = $_FILES['foto']['name'];
            $extensao = strrchr($nomeFoto, '.');

            $sql = "INSERT INTO usuario (nome, usuario, senha, nivel, status, extensao) VALUES ('$nome','$usuario','$senha', '$nivel', '$status', '$extensao')";
            $conexao = new Conexao();
            $retorno =  $conexao->executar($sql);

            $origem = $_FILES['foto']['tmp_name'];
            $destino = 'http://soundbeats.azurewebsites.net/fotos/usuarios/' . $retorno . $extensao;
            
            
            move_uploaded_file($origem, $destino);
            

        }

    }

    function alterar($dados){
        $id_usuario = $dados['id_usuario'];
        $nome = $dados['nome'];
        $sobrenome = $dados['sobrenome'];
        $usuario = $dados['usuario'];
        $senha = $dados['senha'];
        $nivel = $dados['nivel'];
        $status = $dados['status'];

        $sql = "UPDATE usuario set nome ='$nome', sobrenome ='$sobrenome', usuario = '$usuario', senha = '$senha', nivel = '$nivel', status =  '$status' WHERE id_usuario = '$id_usuario'";

        $conexao = new Conexao();
        return $conexao->executar($sql);
    }

    function desativar($id_usuario){

        $sql = "UPDATE usuario set status = '0'  WHERE id_usuario = '$id_usuario'";
        $_SESSION['staus'] = 0;
        $conexao = new Conexao();
        return $conexao->executar($sql);
    }

    function ativar($id_usuario){

        $sql = "UPDATE usuario set status = '1'  WHERE id_usuario = '$id_usuario'";
        $_SESSION['staus'] = 1;

        $conexao = new Conexao();
        return $conexao->executar($sql);
    }

    function recuperarTodos(){

        $sql = "SELECT * FROM usuario";

        $conexao = new Conexao();
        return $conexao->executar($sql);
    }

    function carregarPorId($id_usuario){


        $sql = "select * from usuario where id_usuario = $id_usuario";
        $conexao = new Conexao();

        $dados = $conexao->recuperarTodos($sql);

        $this->id_usuario = $dados[0]['id_usuario'];
        $this->nome = $dados[0]['nome'];
        $this->sobrenome = $dados[0]['sobrenome'];
        $this->usuario = $dados[0]['usuario'];
        $this->senha = $dados[0]['senha'];
        $this->nivel = $dados[0]['nivel'];
        $this->status = $dados[0]['status'];
    }

}

