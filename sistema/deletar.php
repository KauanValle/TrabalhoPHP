<?php  include_once 'lock.php';

if (!isset($_GET['id']))
{
	header('location:index.php?msg=idinvalido');
}
else
{
	$id_livro = $_GET['id'];

	include_once '../database/crud.php';

	$result = deletar($id_livro);

	if ($result)
	{
		header('location:index.php?msg=livrodeletado');
	}
	else
	{
		header('location:index.php?msg=errodeletar');
	}
}


?>