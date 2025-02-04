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
						<div class="card-header">
							<h4> Lista de categorias
								<a href="index.php" class="btn btn-danger float-end" style="margin-left:10px">Voltar</a>
								<a href="categoria-create.php" class="btn btn-primary float-end">Adicionar Categoria</a>
							</h4>
						</div>
						<div class="card-body">
							<form method="GET" action="index_categoria.php" class="d-flex mb-4">
								<input type="text" class="form-control me-2" name="search" placeholder="Buscar por nome de categoria" value="<?=isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
								<button type="submit" class="btn btn-primary">Pesquisar</button>
							</form>
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Id</th>
										<th>Nome</th>
										<th>Descrição</th>
										<th>Ações</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$search= isset($_GET['search']) ? mysqli_real_escape_string($conexao,$_GET['search']) : '';
								
									$sql = 'SELECT * FROM categoria';
									if (!empty($search)){
										$sql .= " WHERE nome LIKE '%$search%'";
									}
									$categorias=mysqli_query($conexao,$sql);
									if (mysqli_num_rows($categorias)>0){
										foreach($categorias as $categoria){
									?>
									<tr>
										<td><?=$categoria['id']?></td>
										<td><?=$categoria['nome']?></td>
										<td><?=$categoria['descricao']?></td>
										<td>
											<a href="categoria-view.php?id=<?=$categoria['id']?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp;Visualizar</a>
											<a href="categoria-edit.php?id=<?=$categoria['id']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
											<form action="acoes.php" method="POST" class="d-inline">
												<button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_categoria" value="<?=$categoria['id']?>" class="btn btn-danger btn-sm">
														<span class="bi-trash-fill"></span>&nbsp;Excluir
												</button>
											</form>
										</td>
									</tr>
									<?php 
									}
									}else{
										echo '<h5>Nenhuma categoria encontrada</h5>';
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
