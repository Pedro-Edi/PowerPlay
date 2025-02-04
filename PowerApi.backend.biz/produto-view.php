<?php 
	include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width , initial-scale=1.0">
		<title>Administração - Loja de Materiais Esportivos</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	</head>
	<body>
		<?php  include('navbar.php');?>
		<div class="container mt-5">
			<?php include('mensagem.php');?>
			<div  class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4> Visualizar produto
								<a href="index_produto.php" class="btn btn-danger float-end">Voltar</a>
							</h4>
						</div>
						<div class="card-body">	
							<?php
								if (isset($_GET['id'])){
									$produto_id= mysqli_real_escape_string($conexao,$_GET['id']);
									$sql = "SELECT produto.*, categoria.nome AS categoria_nome FROM produto LEFT JOIN categoria ON produto.categoria_id = categoria.id WHERE produto.id='$produto_id'";
									$query=mysqli_query($conexao,$sql);
								
									if (mysqli_num_rows($query)>0){
										$produto=mysqli_fetch_array($query);
										?>
										<div class="mb-3">
											<label>Nome</label>
											<p class="form-control">
												<?=$produto['nome'];?>
											</p>
										</div>
										<div class="mb-3">
											<label>Categoria</label>
											<p class="form-control">
												<?=$produto['categoria_nome'];?>
											</p>
										</div>
										<div class="mb-3">
											<label>Preço</label>
											<p class="form-control">
												<?=$produto['preco'];?>
											</p>
										</div>
										<div class="mb-3">
											<label>Quantidade estoque</label>
											<p class="form-control">
												<?=$produto['quantidade_estoque'];?>
											</p>
										</div>
										<div class="mb-3">
											<label>Descrição produto</label>
											<p class="form-control">
												<?=$produto['descricao_produto'];?>
											</p>
										</div>
										<?php
									} else {
										echo "<h5>Produto não encontrado</h5>";
										}
									}
									?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	</body>						
</body>
</html>

