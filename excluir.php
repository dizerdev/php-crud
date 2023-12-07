<?php
if(!isset($_SESSION)){
  session_start();
}
if(!isset($_SESSION['logado']) || !isset($_SESSION['usuario'])){

  header("Location:index.php?aviso=url");
}
##################################
if(isset($_GET['id_cont'])){
	include 'inc/conecta.php';
	$sql = "DELETE FROM contatos WHERE id_cont=?";
  	$stm = $conn->prepare($sql);
  	$id=(int)$_GET['id_cont'];
  	$stm->bind_param('i', $id);
  	$stm->execute();
}
  header("location:listar.php");
  exit;