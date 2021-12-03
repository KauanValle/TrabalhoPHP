<?php include_once 'lock.php';
// se o form de edição nao foi enviado ou se algum campo estiver em branco
if (!isset($_POST['salvar']) || empty($_POST['titulo']) || empty($_POST['autor']) || empty($_POST['editora']))
{
	header('location:index.php?msg=edtembranco');
}
else
{
	$id = $_POST['id'];
	$nome	  = $_POST['nome'];
	$quantidade    = $_POST['quantidade'];
	$preco  = $_POST['preco'];

	include_once '../database/crud.php';

	$result = editar($id, $nome, $quantidade, $preco);

	if ($result)
	{
		header('location:index.php?msg=editado');
	}
	else
	{
		header('location:index.php?msg=erroeditar');
	}
}


?>