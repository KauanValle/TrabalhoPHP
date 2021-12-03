<?php  

function conectar()
{
	$HOST = "";
	$USERNAME = "";
	$PASSWORD = "";
	$DBNAME = "";

	return mysqli_connect($HOST, $USERNAME, $PASSWORD, $DBNAME);
}

?>