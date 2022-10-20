<?php
	session_start();
	if(!isset($_SESSION["email"]) AND !isset($_SESSION["senha"])){
		header("Location: index.php");
		exit;
	} else {
            
}
?>