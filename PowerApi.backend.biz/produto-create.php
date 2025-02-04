<?php 
	include('conexao.php')
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
							<h4> Adicionar produto
								<a href="index_produto.php" class="btn btn-danger float-end">Voltar</a>
							</h4>
						</div>
						<div class="card-body">
							<?php 
								$sql="SELECT id,nome FROM categoria";
								$result=mysqli_query($conexao,$sql)
							?>
							<form action="acoes.php" method="POST">
								<div class="mb-3">
									<label>Nome</label>
									<input type="text" name="nome" class="form-control">
								</div>
								<div class="mb-3">
									<label>Categoria</label>
									<select name="categoria_id" class="form-control">
										<option value="">Selecione uma categoria</option>
										<?php while ($row= $result->fetch_assoc()): ?>
											<option value="<?= $row['id']; ?>"><?= $row['nome'];?></option>
										<?php endwhile;?>
									</select>
								</div>

								
								<div class="mb-3">
									<label>Preço</label>
									<input type="number" name="preco" class="form-control">
								</div>
								<div class="mb-3">
									<label>Quantidade de estoque</label>
									<input type="number" name="quantidade_estoque" class="form-control">
								</div>
								<div class="mb-3">
									<label>Descrição do produto</label>
									<input type="text" name="descricao_produto" class="form-control">
								</div>
								<div class="mb-3">
									<button type="submit" name="create_produto" class="btn btn-primary">Salvar</button>
								</div> 
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
