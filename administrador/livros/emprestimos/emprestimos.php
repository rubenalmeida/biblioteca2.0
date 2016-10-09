<?php

include_once '../../conexao.php';

class Emprestimos{

	protected $id_livros;



	public function getIdLivros()
	{
		return $this->id_livros;
	}

	public function setIdLivros($id_livros)
	{
		$this->id_livros = $id_livros;
	}



	public function devolver($id_livros)
	{
		$sql = "update livros set pessoa = default, data1 = default, data2 = default,  emprestado = '0'  where id_livros = $id_livros";
		$conexao = new Conexao();
		return $conexao->executar($sql);
	}



	public function recuperarTodos()
	{
		$conexao = new Conexao();

		$sql = "select * from livros WHERE emprestado = '1'";
		return $conexao->recuperarTodos($sql);
	}


}