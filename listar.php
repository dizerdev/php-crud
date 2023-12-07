<?php 
if(!isset($_SESSION)){
  session_start();
}
if(!isset($_SESSION['logado']) || !isset($_SESSION['usuario'])){

  header("Location:index.php?aviso=url");
  
}
##################################
include 'inc/conecta.php';

$sql = "SELECT * FROM contatos";
$result = $conn->query($sql);

/*
while($resposta = $result->fetch_object()){
  var_dump($resposta);
}
*/

include 'inc/head.php';
include 'inc/menu.php';
?>
<div >
    <div>

<table id="tabela" >
  <thead class="branco">
  
  <tr>
    <td>Id</td>
    <td >Nome</td>
    <td>telefone</td>
    <td>email</td>
    <td>sexo</td>
    <td>tipo</td>
    <td colspan="2">
   <a class="botao" href="inserir.php">Novo Contato</a>
   </td>
  </tr>
  </thead>
  
<?php while($resposta = $result->fetch_object()): ?>
  
  <tr>
    <td ><?= $resposta->id_cont ?></td>
    <td><?= $resposta->nome ?></td>
    <td><?= $resposta->fone ?></td>
    <td><?= $resposta->email ?></td>
    <td><?= $resposta->sexo ?></td>
    <td><?= $resposta->tipo ?></td>
    <td><a class="botao" href="alterar.php?id_cont=<?= $resposta->id_cont ?>">Alterar</a></td>
    <td><a class="botao" href="excluir.php?id_cont=<?= $resposta->id_cont ?>">Excluir</a></td>
    
  </tr>

 <?php endwhile;?> 
  </table>

	</div>
</div>
<?php include 'inc/footer.php' ?>
