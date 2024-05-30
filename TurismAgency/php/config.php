<?php

$serverName = "GustavoPC";
$connectionOptions = array(
	"Database" => "TURISMAGENCY",
	"Uid" => "sa",
	"PWD" => "masterkey"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
	echo "Não foi possível se conectar ao Banco de Dados" and die (print_r(sqlsrv_errors(), true));
	
}
?>

