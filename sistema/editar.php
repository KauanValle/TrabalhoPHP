<?php include_once 'lock.php';
include_once '../database/crud.php'; 

if (!isset($_GET['id']))
{
	header('location:index.php?msg=idinvalido');
}
else
{
	// tentar buscar o livro especificado no id
	$result = buscar($_GET['id']);

	if($result == null)
	{
		header('location:index.php?msg=idinvalido');
	}
	else
	{
		// converter o retorno (result) em um array associativo
		$produto = mysqli_fetch_assoc($result);
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Projeto Final - Editar Produto</title>
	<style>
		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
			text-align: center;
		}
	</style>
</head>
<body class="container-fluid">
	<?php include_once '../navbar.php'; ?>
	<div class="container">
		<h1>Projeto Final de PHP</h1>

		<p>
			<a href="index.php" class="btn btn-primary btn-sm">Cancelar Edição</a>
		</p>

		<h3>Editar Dados do Produto:</h3>

		<div class="col-5">
			<form action="editado.php" method="post">
				
				<p>
					<label class="form-label">Nome do Produto</label><br>
					<input type="text" name="nome" required value="<?= $produto['nome'] ?>" class="form-control">
				</p>

				<p>
					<label class="form-label">Quantidade do Produto</label><br>
					<input type="text" name="quantidade" required value="<?= $produto['quantidade'] ?>" class="form-control">
				</p>

				<p>
					<label class="form-label">Preço do Produto</label><br>
					<input type="text" name="preco" required value="<?= $produto['preco'] ?>" class="form-control">
				</p>

				<p>
					<button type="submit" name="salvar" class="btn btn-outline-primary">Salvar Alterações</button>
				</p>

				<input type="hidden" name="id" value="<?= $produto['id'] ?>">

			</form>
		</div>
	</div>
</body>
</html>