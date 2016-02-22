<?php
require_once 'conecta.php';
require_once 'EntidadeInterface.php';
require_once 'Alunos.php';
require_once 'ServiceDb.php';


if (isset($_POST['submitted'])) {
   processaForm($conexao);
} else {
   showIncluir();
}

// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function showIncluir() {

   ?>
   <div>
       <form name="frmInserir" action="inserir.php" method="POST">
           <table>
               <thead>
                   <tr>
                       <th colspan='3'>Inclusão</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td>Nome:</td>
                       <td><input type="text" id="nome" name="nome" value="" required="true">
                       </td>
                   </tr>                
                   <tr>
                       <td>Email:</td>
                       <td><input type="text" id="email" name="email" value="" required="true"></td>
                   </tr>                
                   <tr>
                       <td>Nota:</td>
                       <td><input type="text" id="nota" name="nota" value="" validType="email"></td>
                   </tr>
               </tbody>
           </table>
           <input type="submit" id="submitted" name="submitted" class="btn btn-primary" value="Incluir">
       </form>
   </div>
   <?php
}

function processaForm($conexao) {

   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $nota = $_POST['nota'];
   $submmitted = $_POST['submitted'];

   $aluno = new Alunos();
   $serviceDb = new ServiceDb($conexao, $aluno);

   $aluno->setNome($nome);
   $aluno->setEmail($email);
   $aluno->setNota($nota);

   $rs = $serviceDb->inserir();
   
   header('Location: index.php');
   exit;
}
