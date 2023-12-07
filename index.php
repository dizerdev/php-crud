<?php
include 'inc/avisos.php';
if(isset($_COOKIE['lembrar'])){
  $login = $_COOKIE['login'];
  $senha = $_COOKIE['senha'];
  $lembrar = $_COOKIE['lembrar'];
}else{
  $login = null;
  $senha = null;
  $lembrar = null;
}

// $login = $_COOKIE['login'] ?? null;
// $login = $_COOKIE['senha'] ?? null;
// $login = $_COOKIE['lembrar'] ?? null;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<link href="css/estilos.css" rel="stylesheet" type="text/css">

</head>

<body style="padding:50px;">

<form method="post" action="autentica.php" >
  <table  id="tabela" >
    <tr>
      <td >Usuario:</td>
      <td >
        <input type="text" name="login" value="<?= $login ?>">
      </td>
    </tr>
    <tr>
      <td > Senha: </td>
      <td >
        <input type="password" name="senha" value="<?= $senha ?>">
      </td>
    </tr>
    <tr>
      <td><label for="lembrar">Lembrar </label></td>
      <td ><input type="checkbox" name="lembrar" id="lembrar" <?= $lembrar ?> >
     </td>
    </tr>
    <tr>
      <td colspan="2" class="centro">
        <input type="submit" name="autenticar" value="Enviar" >
      </td>
    </tr>
  </table>
  
</form>

</body>
</html>


