<?php  
include_once 'conexao.php';

function salvar($nome, $quantidade, $preco)
{
	$conn = conectar();

	$sql = "INSERT INTO produtos (nome, quantidade, preco) 
	VALUES ('$nome', '$quantidade', '$preco')";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0)
	{
		return true;
	}

	return false;
}

function buscar_livros()
{
	$conn = conectar();

	$sql = "SELECT * FROM produtos";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0)
	{
		return $result;
	}

	return null;
}

function exibir_livros()
{
	$result = buscar_livros();

	if ($result == null)
	{
		$retorno = '<h3>Não há items cadastrados</h3>';
	}
	else
	{
		$retorno = '<div class="col-6">
						<table class="table table-hover">
							<tr>
								<th>ID #</th>
								<th>Título</th>
								<th>Autor</th>
								<th>Editora</th>
								<th>Deletar</th>
								<th>Editar</th>
							</tr>';

		while ($livro = mysqli_fetch_assoc($result))
		{
			$retorno .= '<tr>';
			$retorno .= "<td>" . $livro['id_livro'] . "</td>";
			$retorno .= "<td>" . $livro['titulo']   . "</td>";
			$retorno .= "<td>" . $livro['autor']    . "</td>";
			$retorno .= "<td>" . $livro['editora']  . "</td>";
			$retorno .= "<td>" . link_deletar($livro['id_livro']) . "</td>";
			$retorno .= "<td>" . link_editar($livro['id_livro'])  . "</td>";
			$retorno .= '</tr>';
		}

		$retorno .= '</table>';
		$retorno .= '</div>';
	}

	return $retorno;
}

function link_deletar($id_livro)
{
	$link = '<a href="deletar.php?id_livro='.$id_livro.'" 
	onclick="return confirm(\'Tem certeza que deseja excluir este livro?\')" class="btn btn-danger">Deletar</a>';

	return $link;
}

function link_editar($id_livro)
{
	$link = '<a href="editar.php?id_livro='.$id_livro.'" class="btn btn-warning">Editar</a>';
	return $link;
}

function deletar_livro($id_livro)
{
	$conn = conectar();

	$sql = "DELETE FROM livros_tb WHERE id_livro = $id_livro";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0)
	{
		return true;
	}

	return false;
}

function buscar_livro($id_livro)
{
	$conn = conectar();

	$sql = "SELECT * FROM produtos WHERE id = $id_livro";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0)
	{
		return $result;
	}

	return null;
}

function editar_livro($nome, $quantidade, $preco, $id)
{
	$conn = conectar();

	$sql = "UPDATE produtos SET nome = '$nome', quantidade = '$quantidade', preco = '$preco' 
	WHERE id = $id";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0)
	{
		return true;
	}

	return false;
}
