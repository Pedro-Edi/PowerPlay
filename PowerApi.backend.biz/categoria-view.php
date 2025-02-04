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
							<h4> Visualizar categoria
								<a href="index_categoria.php" class="btn btn-danger float-end">Voltar</a>
							</h4>
						</div>
						<div class="card-body">	
							<?php
								if (isset($_GET['id'])){
									$categoria_id= mysqli_real_escape_string($conexao,$_GET['id']);
									$sql = "SELECT * FROM categoria WHERE id='$categoria_id'";
									$query=mysqli_query($conexao,$sql);
								
									if (mysqli_num_rows($query)>0){
										$categoria=mysqli_fetch_array($query);
										?>
										<div class="mb-3">
											<label>Nome</label>
											<p class="form-control">
												<?=$categoria['nome'];?>
											</p>
										</div>
										<div class="mb-3">
											<label>Descrição</label>
											<p class="form-control">
												<?=$categoria['descricao'];?>
											</p>
										</div>
										<?php
									} else {
										echo "<h5>Categhoria não encontrado</h5>";
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

