<?php

//try {
//$conexao = new \PDO("mysql:host=localhost;dbname=pdo", "bd_pdo", "pdobdpdo");
//} catch (\PDOException $e) {
//   die("N�o foi poss�vel estabelecer a conex�o com o banco de dados: Erro c�digo: " . $e->getCode() . ": " . $e->getMessage());
//}


$conexao = new \PDO("mysql:host=localhost;dbname=pdo", "bd_pdo", "pdobdpdo");
// Check connection
if (mysqli_connect_errno()) {
   echo "FALHA NA CONEX�O: " . mysqli_connect_error();
}
