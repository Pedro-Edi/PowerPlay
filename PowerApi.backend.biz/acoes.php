<?php

	session_start();
	include 'conexao.php';
	if (isset($_POST['create_produto'])){
		$nome= mysqli_real_escape_string($conexao,trim($_POST['nome']));
		$categoria_id= mysqli_real_escape_string($conexao,trim($_POST['categoria_id']));
		$preco=mysqli_real_escape_string($conexao,trim($_POST['preco']));
		$quantidade_estoque=mysqli_real_escape_string($conexao,trim($_POST['quantidade_estoque']));
		$descricao_produto=mysqli_real_escape_string($conexao,trim($_POST['descricao_produto']));
		
		$sql="INSERT INTO produto(nome,categoria_id,preco,quantidade_estoque,descricao_produto) VALUES('$nome',$categoria_id,$preco,$quantidade_estoque,'$descricao_produto')";
		
				
		mysqli_query($conexao,$sql);
		if (mysqli_affected_rows($conexao)>0){
			$_SESSION['mensagem']= 'Produto criado com sucesso';
			header("Location: index_produto.php");
			exit();
		} else {
			$_SESSION['mensagem']= 'Produto não foi criado';
			header("Location:index_produto.php");
			exit();
		}
	}
	if (isset($_POST['create_categoria'])){
		$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
		$descricao = mysqli_real_escape_string($conexao,trim($_POST['descricao']));
		
		$sql="INSERT INTO categoria(nome,descricao) VALUES('$nome','$descricao')";
	
		mysqli_query($conexao,$sql);
		if (mysqli_affected_rows($conexao)>0){
			$_SESSION['mensagem']='Categoria criada com sucesso';
			header("Location: index_categoria.php");
			exit();
		} else {
			$_SESSION['mensagem']='Categoria não foi criada';
			header("Location: index_categoria.php");
			exit();
		}
		}
	if (isset($_POST['update_produto'])){
		$produto_id= mysqli_real_escape_string($conexao,$_POST['produto_id']);
		$nome=mysqli_real_escape_string($conexao,trim($_POST['nome']));
		$categoria_id=mysqli_real_escape_string($conexao,trim($_POST['categoria_id']));
		$preco=mysqli_real_escape_string($conexao,trim($_POST['preco']));
		$quantidade_estoque=mysqli_real_escape_string($conexao,trim($_POST['quantidade_estoque']));
		$descricao_produto=mysqli_real_escape_string($conexao,trim($_POST['descricao_produto']));
		
		$sql="UPDATE produto SET nome= '$nome',categoria_id='$categoria_id',preco= $preco,quantidade_estoque=$quantidade_estoque,descricao_produto='$descricao_produto' WHERE id=$produto_id";
		mysqli_query($conexao,$sql);
		
		if (mysqli_affected_rows($conexao)>0){
			$_SESSION['mensagem']= 'Produto atualizado com sucesso';
			header('Location: index_produto.php');
			exit();
		} else {
			$_SESSION['mensagem']= 'Produto não foi atualizado';
			header('Location:index_produto.php');
			exit();
		}
		}

	if (isset($_POST['update_categoria'])){
		$categoria_id=mysqli_real_escape_string($conexao,$_POST['categoria_id']);
		$nome= mysqli_real_escape_string($conexao,trim($_POST['nome']));
		$descricao= mysqli_real_escape_string($conexao,trim($_POST['descricao']));
	
		$sql="UPDATE categoria SET nome='$nome',descricao='$descricao' WHERE id=$categoria_id";

		mysqli_query($conexao,$sql);
		if (mysqli_affected_rows($conexao)>0){
			$_SESSION['mensagem'] ='Categoria atualizada com sucesso';
			header('Location:index_categoria.php');
			exit();
		}else{
			$_SESSION['mensagem'] = 'Categoria não foi atualizada';
			header('Location:index_categoria.php');
			exit();
		}
		}
	if (isset($_POST['delete_produto'])){
		$produto_id=mysqli_real_escape_string($conexao,$_POST['delete_produto']);
		
		$sql="DELETE FROM produto WHERE id=$produto_id";
		
		mysqli_query($conexao,$sql);
		
		if (mysqli_affected_rows($conexao)>0) {
			$_SESSION['mensagem']='Produto deletado com sucesso.';
			header('Location:index_produto.php');
			exit();
		} else {
			$_SESSION['mensagem']='Produto não foi deletado.';
			header('Location:index_produto.php');
			exit();
		}
		}
	if (isset($_POST['delete_categoria'])){
		$categoria_id=mysqli_real_escape_string($conexao,$_POST['delete_categoria']);
		$sql="DELETE FROM categoria WHERE id=$categoria_id";
		mysqli_query($conexao,$sql);
		if (mysqli_affected_rows($conexao)>0){
			$_SESSION['mensagem']='Categoria deletada com sucesso';
			header("Location:index_categoria.php");
			exit();
		}else{
			$_SESSION['mensagem']='Categoria não foi deletada';
			header("Location:index_categoria.php");
			exit();
		}
		}
?>
