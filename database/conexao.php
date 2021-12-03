<?php  

function conectar()
{
	$HOST = "localhost";
	$USERNAME = "root";
	$PASSWORD = "";
	$DBNAME = "trabalhophp";

	return mysqli_connect($HOST, $USERNAME, $PASSWORD, $DBNAME);
}

?>