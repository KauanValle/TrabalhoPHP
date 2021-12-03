<?php  include_once 'lock.php';
if (!isset($_POST['salvar']) || empty($_POST['nome']) || empty($_POST['quantidade']) || empty($_POST['preco']))
{
	header('location:index.php?msg=cadembranco');
}
else
{
	$nome	 = $_POST['nome'];
	$quantidade   = $_POST['quantidade'];
	$preco = $_POST['preco'];

	include_once '../database/crud.php';

	$resultado = salvar($nome, $quantidade, $preco);

	if ($resultado)
	{
		header('location:index.php?msg=cadastrado');
	}
	else
	{
		header('location:index.php?msg=errocadastro');
	}
}

?>