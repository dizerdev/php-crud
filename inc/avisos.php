<?php

if(isset($_GET['aviso']) AND $_GET['aviso'] == "tentou"){
	echo "<script language=\"JavaScript\" type=\"text/javascript\"> \n";
	echo "<!-- \n";
	echo "alert(\"\\tNão autorizado! \\n\\nUsuário e/ou senha incorretos\"); \n";
	echo "//--> \n";
	echo "</script> \n";
}

if(isset($_GET['aviso']) AND $_GET['aviso'] == "url"){
	echo "<script language=\"JavaScript\" type=\"text/javascript\"> \n";
	echo "<!-- \n";
	echo "alert(\"\\t Área Restrita!!! \\n\\nUsuario precisa ser autenticado\"); \n";
	echo "//--> \n";
	echo "</script> \n";
	
}
?>