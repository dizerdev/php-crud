<?php

if(isset($_POST['autenticar'])){
	include 'inc/conecta.php';
	$sql="SELECT * FROM usuarios WHERE usuario=? AND senha=?";
	$stm = $conn->prepare($sql);
	extract($_POST);
	$stm->bind_param('ss', $login, $senha);
	$stm->execute();
	$stm->store_result();
	
	if($stm->num_rows == 1){
		session_start();
		// flag de sessao
		$_SESSION['logado']=true;
		$_SESSION['usuario']=$_POST['login'];

		if(isset($_POST['lembrar'])){
			setcookie('login', $_POST['login'], time()+10000);
			setcookie('senha', $_POST['senha'], time()+10000);
			setcookie('lembrar', 'checked', time()+10000);
		}else{
			setcookie('login', $_POST['login'], time()-10000);
			setcookie('senha', $_POST['senha'], time()-10000);
			setcookie('lembrar', 'checked', time()-10000);
		}

		header("Location:listar.php");
		
	}else{

		header("Location:index.php?aviso=tentou");
	}

	exit;
	
}else{
	header("Location:index.php?aviso=url");
}
