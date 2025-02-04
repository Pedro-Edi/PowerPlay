<?php 
	include('conexao.php');


	$categoria_id= isset($_GET['categoria']) ? $_GET['categoria'] : '';

	$sqlCategorias="SELECT * FROM categoria";
	$resultCategorias=mysqli_query($conexao,$sqlCategorias);

	$sqlProdutos ="SELECT produto.* , categoria.nome AS categoria_nome FROM produto LEFT JOIN categoria ON produto.categoria_id = categoria.id";
	if ($categoria_id != ''){
		$sqlProdutos .=" WHERE categoria_id = " . intval($categoria_id);
	}
	$resultProdutos=mysqli_query($conexao,$sqlProdutos);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Produtos por categoria</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

	</head>

	<body class="container mt-4">
		<h2 class="text-center">Filtrar Produtos por categoria</h2>
		
		<form method="GET" class="text-center">
			<label for="categoria">Selecione a categoria:</label>
			<select name="categoria" id="categoria" class="form-select w-50 d-inline-block">
				<option value="">TODAS</option>
				<?php while($row = mysqli_fetch_assoc($resultCategorias)) : ?>
					<option value="<?= $row['id']; ?>" <?= ($row['id'] == $categoria_id) ? 'selected' : '';?>>
						<?= $row['nome'];?>
					</option>
				<?php endwhile; ?>
			</select>
			<button type="submit" class="btn btn-primary">Filtrar</button>
		</form>
		<table class="table table-striped mt-4">
			<thead class="table-dark">
				<tr>
					<th>Nome</th>
					<th>Categoria</th>
					<th>Preço</th>
					<th>Quantidade de estoque</th>
					<th>Descrição do produto</th>
				</tr>
			</thead>
			<tbody>
				<?php while($row =mysqli_fetch_assoc($resultProdutos)) {?>
					<tr>
						<td><?= $row['nome']; ?></td>
						<td><?= $row['categoria_nome']; ?></td>
						<td><?= $row['preco']; ?></td>
						<td><?= $row['quantidade_estoque']; ?></td>
						<td><?= $row['descricao_produto']; ?></td>
					</tr>
				<?php } ?>
			
			</tbody>
		</table>
	</body>
</html>
