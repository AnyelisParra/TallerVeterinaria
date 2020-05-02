<?php
session_start();
if(!isset($_SESSION['Reg'])){
	
	header('Location: login.php');

}else{

	if($_SESSION['Reg']!='ok'){
		header('Location: login.php');
	}else{
		include("menu.php");
		if(isset($_GET['a'])){
			if($_GET['a']=='adm')include("administrador.php");
			if($_GET['a']=='usu')include("usuarios.php");
			if($_GET['a']=='mas')include("mascota.php");
		}
		if(isset($_GET['b'])){
			session_destroy();
			header('Location: login.php');
		}
	}

}		

?>
