<?php
	
	if (isset($_POST["usuario"])) {
			$username = $_POST['usuario'];
			$password = $_POST['senha'];
			
   
			session_start();
			$_SESSION['usuario'] = $username;
			$_SESSION['senha'] = $password;

			if (isset($_SESSION['usuario'])&& isset($_SESSION['senha'])) {

			header('Location: index.php');
			}
    } 	



 


?>


