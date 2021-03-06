<?php include_once 'lock.php';
include_once '../database/crud.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Projeto Final - Area Restrita</title>
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
		<p>
			<a href="logout.php" class="btn btn-primary btn-sm">Sair do sistema</a>
		</p>

		<?php  

		if (isset($_GET['msg']))
		{
			include_once '../util.php';
			echo validar_msg($_GET['msg']);
		}
		?>

		<h3>Cadastrar Livro:</h3>

		<div class="col-5">
			<form action="cadastrar.php" method="post">
				
				<p>
					<label class="form-label">Nome do Produto</label><br>
					<input type="text" name="nome" required class="form-control">
				</p>

				<p>
					<label class="form-label">Quantidade do Produto</label><br>
					<input type="text" name="quantidade" required class="form-control">
				</p>

				<p>
					<label class="form-label">Preço do Produto</label><br>
					<input type="text" name="preco" required class="form-control">
				</p>

				<p>
					<button type="submit"  name="salvar" class="btn btn-primary">Salvar</button>
				</p>

			</form>
		</div>

		<h2>Livros Cadastrados</h2>

		<?php  

		echo exibir();

		?>
	</div>

</body>
</html>