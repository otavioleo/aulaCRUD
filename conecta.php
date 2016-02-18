<?php

//try {
//$conexao = new \PDO("mysql:host=localhost;dbname=pdo", "bd_pdo", "pdobdpdo");
//} catch (\PDOException $e) {
//   die("Não foi possível estabelecer a conexão com o banco de dados: Erro código: " . $e->getCode() . ": " . $e->getMessage());
//}


$conexao = new \PDO("mysql:host=localhost;dbname=pdo", "bd_pdo", "pdobdpdo");
// Check connection
if (mysqli_connect_errno()) {
   echo "FALHA NA CONEXÃO: " . mysqli_connect_error();
}
