<?php 
	session_start();
	include('conexao.php');
?>
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
					<div class="card">
						<div class="card-header buttons">
							<h4> Lista de produtos	
								<a href="index.php" class="btn btn-danger float-end" style="margin-left:10px">Voltar</a>
								<a href="produto-create.php" class="btn btn-primary float-end">Adicionar Produto</a>
							
							</h4>
						</div>
						<div class="card-body">
							<form method="GET" action="index_produto.php" class="d-flex mb-4">
								<input type="text" class="form-control me-2" name="search" placeholder="Buscar por nome de produto" value="<?=isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
								<button type="submit" class="btn btn-primary">Pesquisar</button>
							</form>
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Id</th>
										<th>Nome</th>
										<th>Categoria</th>
										<th>Preço</th>
										<th>Quantidade de estoque</th>
										<th>Descrição do produto</th>
										<th>Ações</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$search= isset($_GET['search']) ? mysqli_real_escape_string($conexao,$_GET['search']) : '';

	
								
									$sql = 'SELECT produto.*, categoria.nome AS categoria_nome FROM produto JOIN categoria ON produto.categoria_id= categoria.id';
									if (!empty($search)){
										$sql .= " WHERE produto.nome LIKE '%$search%'";
									}
									$produtos=mysqli_query($conexao,$sql);
									if (mysqli_num_rows($produtos)>0){
										foreach($produtos as $produto){
									?>
									<tr>
										<td><?=$produto['id']?></td>
										<td><?=$produto['nome']?></td>
										<td><?=$produto['categoria_nome']?></td>
										<td><?=$produto['preco']?></td>
										<td><?=$produto['quantidade_estoque']?></td>
										<td><?=$produto['descricao_produto']?></td>
										<td>
											<a href="produto-view.php?id=<?=$produto['id']?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp;Visualizar</a>
											<a href="produto-edit.php?id=<?=$produto['id']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
											<form action="acoes.php" method="POST" class="d-inline">
												<button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_produto" value="<?=$produto['id']?>" class="btn btn-danger btn-sm">
														<span class="bi-trash-fill"></span>&nbsp;Excluir
												</button>
											</form>
										</td>
									</tr>
									<?php 
									}
									}else{
										echo '<h5>Nenhum produto encontrado</h5>';
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	</body>						
</body>
</html>
