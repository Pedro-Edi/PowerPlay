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
							<h4> Editar categoria
								<a href="index_categoria.php" class="btn btn-danger float-end">Voltar</a>
							</h4>
						</div>
						<div class="card-body">
							<form action="acoes.php" method="POST">
								<?php 
									if (isset($_GET['id'])){
										$categoria_id= mysqli_real_escape_string($conexao,$_GET['id']);
										$sql = "SELECT * FROM categoria WHERE id='$categoria_id'";
										$query= mysqli_query($conexao,$sql);
										if (mysqli_num_rows($query)>0) {
											$categoria=mysqli_fetch_array($query);
								?>
								<form action="acoes.php" method="POST">
									<input type="hidden" name="categoria_id" value="<?=$categoria['id']?>">
									<div class="mb-3">
										<label>Nome</label>
										<input type="text" name="nome" value="<?=$categoria['nome']?>" class="form-control">
									</div>
									
									<div class="mb-3">
										<label>Descrição do produto</label>
										<input type="text" name="descricao" value="<?=$categoria['descricao']?>" class="form-control">
									</div>
									<div class="mb-3">
										<button type="submit" name="update_categoria" class="btn btn-primary">Salvar</button>
									</div>
								</form>
								<?php
								} else {
									echo "<h5>Categoria não encontrada</h5>";
								}
								}
								?> 
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	</body>						
</body>
</html>
