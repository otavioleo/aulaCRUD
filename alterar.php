<?php
require_once 'conecta.php';
require_once 'EntidadeInterface.php';
require_once 'Alunos.php';
require_once 'ServiceDb.php';

$id = $_REQUEST['id'];
if (isset($_POST['submitted'])) {
   processaForm($conexao, $id);
} else {
   showAlterar($conexao, $id);
}

// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function showAlterar($conexao, $id) {

   $aluno = new Alunos();
   $serviceDb = new ServiceDb($conexao, $aluno);
   $rs = $serviceDb->find($id);
   $nome = $rs['nome'];
   $email = $rs['email'];
   $nota = $rs['nota'];
   ?>
   <div>
       <form name="frmAltera" action="alterar.php" method="POST">
           <table>
               <thead>
                   <tr>
                       <th colspan='3'>Alteração</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td>Nome:</td>
                       <td><input type="text" id="nome" name="nome" value="<?php echo $nome; ?>">
                           <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                       </td>
                   </tr>                
                   <tr>
                       <td>Email:</td>
                       <td><input type="text" id="email" name="email" value="<?php echo $email; ?>"></td>
                   </tr>                
                   <tr>
                       <td>Nota:</td>
                       <td><input type="text" id="nota" name="nota" value="<?php echo $nota; ?>"></td>
                   </tr>
               </tbody>
           </table>
           <input type="submit" id="submitted" name="submitted" class="btn btn-primary" value="Salvar">
       </form>
   </div>
   <?php
}

function processaForm($conexao, $id) {

   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $nota = $_POST['nota'];
   $submmitted = $_POST['submitted'];

   $aluno = new Alunos();
   $serviceDb = new ServiceDb($conexao, $aluno);

   $aluno->setId($id);
   $aluno->setNome($nome);
   $aluno->setEmail($email);
   $aluno->setNota($nota);

   $rs = $serviceDb->alterar($id);
   
   header('Location: index.php');
   exit;
}
