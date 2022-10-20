<?php
	session_start();
	if(!isset($_SESSION["email"]) AND !isset($_SESSION["senha"])){
		header("Location: index.php");
		exit;
	}elseif($_SESSION["nivel"]==2){
                header("Location: index.php?pg=menu_usuario&op=eventos");
		
	} else {
            
}
?>