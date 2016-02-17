<?php
require_once 'EntidadeInterface.php';
require_once 'Alunos.php';
require_once 'ServiceDb.php';

try {
   $conexao = new \PDO("mysql:host=localhost;dbname=pdo", "bd_pdo", "pdobdpdo");
} catch (\PDOException $e) {
   die("N�o foi poss�vel estabelecer a conex�o com o banco de dados: Erro c�digo: " . $e->getCode() . ": " . $e->getMessage());
}

$id = $_REQUEST['id'];
if (isset($_POST['submitted'])) {
   processaForm($conexao, $id);
} else {
   showExcluir($conexao, $id);
}

// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function showExcluir($conexao, $id) {

   $aluno = new Alunos();
   $serviceDb = new ServiceDb($conexao, $aluno);
   $rs = $serviceDb->find($id);
   $nome = $rs['nome'];
   $email = $rs['email'];
   $nota = $rs['nota'];
   ?>
   <div>
       <form name="frmAltera" action="excluir.php" method="POST">
           <table>
               <thead>
                   <tr>
                       <th colspan='3'>Exclus�o</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td>Nome:</td>
                       <td><?php echo $nome; ?>
                           <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                       </td>
                   </tr>                
                   <tr>
                       <td>Email:</td>
                       <td><?php echo $email; ?></td>
                   </tr>                
                   <tr>
                       <td>Nota:</td>
                       <td><?php echo $nota; ?></td>
                   </tr>
               </tbody>
           </table>
           <input type="submit" id="submitted" name="submitted" class="btn btn-primary" value="Excluir">
       </form>
   </div>
   <?php
}

function processaForm($conexao, $id) {

   $aluno = new Alunos();
   $serviceDb = new ServiceDb($conexao, $aluno);

   $aluno->setId($id);

   $rs = $serviceDb->deletar($id);
   
   header('Location: index.php');
   exit;
}
