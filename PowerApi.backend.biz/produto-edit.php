<?php
 	session_start(); 
	include 'conexao.php'
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
			<div  class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4> Editar produto
								<a href="index_produto.php" class="btn btn-danger float-end">Voltar</a>
							</h4>
						</div>
						<div class="card-body">
							
							<?php 
								if (isset($_GET['id'])){
										
									$produto_id= mysqli_real_escape_string($conexao,$_GET['id']);
									$sql = "SELECT * FROM produto WHERE id='$produto_id'";
									$query= mysqli_query($conexao,$sql);
									if (mysqli_num_rows($query)>0) {
										$produto=mysqli_fetch_array($query);
							?>
							<form action="acoes.php" method="POST">
								<input type="hidden" name="produto_id" value="<?=$produto['id']?>">
								<div class="mb-3">
									<label>Nome</label>
									<input type="text" name="nome" value="<?=$produto['nome']?>" class="form-control">
								</div>
								<div class="mb-3">
									<label>Categoria</label>
									<select name="categoria_id" class="form-control">
										<option value="">Selecione uma categoria</option>
										<?php 
										$sql= "SELECT id,nome FROM categoria";
										$result= mysqli_query($conexao,$sql);
										
										if ($result && mysqli_num_rows($result)>0):
											while ($row = $result->fetch_assoc()):
												$selected=($row['id'] == $produto['categoria_id']) ? 'selected' : '';
										?>
											<option value="<?= $row['id'];?>" <?=$selected;?>><?= $row['nome']; ?></option>
										<?php
											endwhile;
										else:
										?>
											<option value="">Nenhuma categoria encontrada</option>
										<?php endif;?>
									</select>
							
								</div>
								<div class="mb-3">
									<label>Preço</label>
									<input type="number" name="preco" value="<?=$produto['preco']?>" class="form-control">
								</div>
								<div class="mb-3">
									<label>Quantidade de estoque</label>
									<input type="number" name="quantidade_estoque" value="<?=$produto['quantidade_estoque']?>" class="form-control">
								</div>
								<div class="mb-3">
									<label>Descrição do produto</label>
									<input type="text" name="descricao_produto" value="<?=$produto['descricao_produto']?>" class="form-control">
								</div>
								<div class="mb-3">
									<button type="submit" name="update_produto" class="btn btn-primary">Salvar</button>
								</div>		
							</form>						
							<?php
							} else{
								echo"<h5>Produto não econtrao</h5>";
								}
							}?>
								 
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	</body>						
</body>
</html>
