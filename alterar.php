<?php 
if(!isset($_SESSION)){
  session_start();
}
if(!isset($_SESSION['logado']) || !isset($_SESSION['usuario'])){

  header("Location:index.php?aviso=url");
}
##################################
include 'inc/conecta.php';
######################################################################
if(isset($_POST['alterar'])){
  /*
  $nome = $_POST['nome'];
  */
  extract($_POST);
  $id = (int)($_POST['id_cont']);
  $sql = "UPDATE contatos SET nome=?, fone=?, email=?, sexo=?, tipo=? WHERE id_cont=?";
  $stm = $conn->prepare($sql);
  $stm->bind_param('sssssi', $nome, $fone, $email, $sexo, $tipo, $id);
  $stm->execute();
  header("location:listar.php");
  exit;

}

#################################################################

if(isset($_GET['id_cont'])){
  $sql = "SELECT * FROM contatos WHERE id_cont=?";
  $stm = $conn->prepare($sql);
  $id=(int)$_GET['id_cont'];
  $stm->bind_param('i', $id);
  $stm->execute();
  $result = $stm->get_result();
  $resposta = $result->fetch_object();
  //var_dump($resposta);
}


include 'inc/head.php';
include 'inc/menu.php';
?>
<div id="formulario">
  <form id="form1" name="form1" method="post" action="<?= $_SERVER['PHP_SELF']?>" >
    <p>&nbsp;</p>
    <table id="tabela">
      <tr>
        <th >Nome:</th>
        <td ><input type="text" name="nome" value="<?= $resposta->nome?>"></td>
      </tr>
      <tr>
        <th>Telefone: </th>
        <td><input type="text" name="fone" value="<?= $resposta->fone?>" ></td>
      </tr>
      <tr>
        <th>email:</th>
        <td><input type="text" name="email" value="<?= $resposta->email?>"></td>
      </tr>
      <tr>
        <th >sexo: </th>
        <td>
          <label>
            <input type="radio" name="sexo" value="m" id="sexo_0" <?= $resposta->sexo == 'm' ? 'checked' : null ?>>
            Masculino</label>
          <label>
            <input type="radio" name="sexo" value="f" id="sexo_1" <?= $resposta->sexo == 'f' ? 'checked' : null ?>>
            Feminino</label>
          
        </td>
      </tr>
      <tr>
        <th>tipo: </th>
        <td><select name="tipo" id="tipo">
          <option value="par" <?= $resposta->tipo == 'par' ? 'selected' : null ?>>Particular</option>
          <option value="esc"  <?= $resposta->tipo == 'esc' ? 'selected' : null ?>>Escola</option>
          <option value="fam"  <?= $resposta->tipo == 'fam' ? 'selected' : null ?>>Familia</option>
          <option value="tra"   <?= $resposta->tipo == 'tra' ? 'selected' : null ?>>Trabalho</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="2"><input type="hidden" name="id_cont" id="id_cont" value="<?= $resposta->id_cont?>"></td>
      </tr>
      <tr>
        <td colspan="2">
          <input name="alterar" type="submit" id="alterar" value="Alterar" >
        </td>
      </tr>
    </table>
  </form>
</div>
<?php include 'inc/footer.php' ?>