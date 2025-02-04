<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width , initial-scale=1.0">
		<title>Administração - Loja de Materiais Esportivos</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	</head>
	<body>
		<?php  include('navbar.php');?>
		<div class="container mt-4">
			<?php include('mensagem.php');?>
			<div  class="row">
				<div class="col-md-12">
					<div class="card text-center">
						<div class="card-header">
							<h4>Administração -  PowerPlay
							</h4>
						</div>
						<div class="card-body">
							<p class="lead">Escolha  qual seção deseja gerenciar:</p>
							<a href="index_produto.php" class="btn btn-primary btn-lg m-2">
								<i class="bi bi-box-seam"></i>Gerenciar Produtos
							</a>
							<a href="index_categoria.php" class="btn btn-success btn-lg m-2">
								<i class="bi bi-tags"></i> Gerenciar Categorias
							</a>

						</div>
						<div class="card-footer text-muted">
							CRUD -  POWER PLAY
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	</body>						
</body>
</html>
