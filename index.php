<?php
require_once 'conecta.php';
require_once 'EntidadeInterface.php';
require_once 'Alunos.php';
//require_once 'Tabelas.php';
require_once 'ServiceDb.php';

// gerarTabelas($conexao);
// $alunos = new Tabelas();
$alunos = new Alunos();
$serviceDb = new ServiceDb($conexao, $alunos);

//$query = "SHOW TABLES FROM pdo";
//$rs = $conexao->query("$query");
//$All = $rs->fetchAll();
//foreach ($All as $item) {
//   echo ($item [0]) . "\n";
//   $alunos = new Tabelas();
//   $serviceDb = new ServiceDb($conexao, $alunos);
//}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Crud - PHP - Mysql</title>
        <style type="text/css">
            #fm{
                margin:0;
                padding:10px 30px;
            }
            .ftitle{
                font-size:14px;
                font-weight:bold;
                color:#666;
                padding:5px 0;
                margin-bottom:10px;
                border-bottom:1px solid #ccc;
            }
            .fitem{
                margin-bottom:5px;
            }
            .fitem label{
                display:inline-block;
                width:80px;
            }
        </style>
    </head>
    <body>
        <h2>Crud - PHP - Mysql - Cadastro de Alunos</h2>
        <table width="200" border="1" cellspacing="0" cellpadding="0">
            <th>Nome</th>
            <th>Nota</th>
            <th>Nota</th>
            <th>Editar</th>
            <th>Excluir</th>

<?php
foreach ($serviceDb->listar("nome Asc") as $c) {
   $cid = $c['id'];
   print "<tr><td nowrap>";
   echo $c['nome'];
   print "</td><td nowrap>";
   echo $c['email'];
   print "</td><td>";
   echo $c['nota'];
   print "</td><td>";
   print "<a href='alterar.php?id=$cid'>Alterar</a>";
   print '</td><td>';
   print "<a href='excluir.php?id=$cid'>Excluir</a>";
   print "</td></tr>";
}
?>
        </table>
        <div id="toolbar">
            <br>
            <a href="inserir.php" class="easyui-linkbutton" iconCls="icon-add" plain="true" title="Adicionar Aluno">Inclusão de Alunos</a>
        </div>
    </body>
</html>
