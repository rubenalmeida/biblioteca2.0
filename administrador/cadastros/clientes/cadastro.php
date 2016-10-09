<?php

include_once "../conexao.php";

class Clientes{

    protected $id_cliente;
    protected $nome;
    protected $sexo;
    protected $email;
    protected $senha;
    protected $telefone;
    protected $endereco;
    protected $status;


    public function getIdCliente()
    {
        return $this->id_cliente;
    }


    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }


    public function getNome()
    {
        return $this->nome;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getSenha()
    {
        return $this->senha;
    }


    public function setSenha($senha)
    {
        $this->senha = $senha;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSexo()
    {
        return $this->sexo;
    }


    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }


    public function getTelefone()
    {
        return $this->telefone;
    }


    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }


    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
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
        $sexo = $dados['sexo'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $telefone = $dados['telefone'];
        $endereco = $dados['endereco'];
        $status = $dados['status'];

        $sql  = "INSERT INTO cliente (nome , email, senha, sexo, telefone, endereco, status) VALUES('$nome','$email','$senha', '$sexo', '$telefone', '$endereco', '$status')";

        $conexao = new Conexao();
        return $conexao->executar2($sql);
    }



    function alterar($dados){

        $id_cliente = $dados['id_cliente'];
        $nome = $dados['nome'];
        $sexo = $dados['sexo'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $telefone = $dados['telefone'];
        $endereco = $dados['endereco'];
        $status = $dados['status'];

        $sql  = "UPDATE cliente set nome = '$nome' , email ='$email', senha = '$senha', sexo = '$sexo', telefone = '$telefone', endereco = '$endereco', status = '$status' WHERE id_cliente = '$id_cliente'";
        print_r($sql);

        $conexao = new Conexao();
        return $conexao->executar2($sql);
    }


    function excluir($id_cliente){

        $sql = "DELETE FROM cliente WHERE id_cliente = '$id_cliente'";
        $conexao = new Conexao();
        return $conexao->executar2($sql);
    }

    function recuperarTodos(){

        $sql = "SELECT * FROM cliente";
        $conexao = new Conexao();
        return $conexao->recuperarTodos($sql);
    }

    function recuperarTodosAtivos(){

        $sql = "SELECT * FROM cliente WHERE status = '1'";
        $conexao = new Conexao();
        return $conexao->recuperarTodos($sql);
    }

    public function ativar($id_cliente){

         $sql = "update cliente set status = '1' where id_cliente = '$id_cliente' ";
         $conexao = new Conexao();
         return $conexao->executar2($sql);

     }

     public function desativar($id_cliente){

         $sql = "update cliente set status = '0' where id_cliente = '$id_cliente' ";
         $conexao = new Conexao();
         return $conexao->executar2($sql);

     }

    function carregarPorId($id_cliente){

        $sql = "select * from cliente where id_cliente = $id_cliente";
        $conexao = new Conexao();
        $dados = $conexao->recuperarTodos($sql);

        $this->id_cliente = $dados[0]['id_cliente'];
        $this->nome = $dados[0]['nome'];
        $this->email = $dados[0]['email'];
        $this->senha = $dados[0]['senha'];
        $this->sexo = $dados[0]['sexo'];
        $this->telefone = $dados[0]['telefone'];
        $this->endereco = $dados[0]['endereco'];
        $this->status = $dados[0]['status'];
    }

}