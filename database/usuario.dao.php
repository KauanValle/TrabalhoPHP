<?php  

function buscar_usuario($usuario, $senha)
{
	include_once 'conexao.php';

	$conn = conectar();

	$sql = "SELECT * FROM usuarios WHERE nome = '$usuario' AND senha = '$senha' ";

	$result = mysqli_query($conn, $sql);
	
	if (mysqli_affected_rows($conn) > 0)
	{
		return true;
	}
	
	return false;
	
}


?>