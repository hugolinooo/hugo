<?php
    
    session_start();
	$usuario = strip_tags($_POST['login']);
	$senha = strip_tags($_POST['senha']);
    $senha = sha1(strip_tags($_POST['senha']));
    // conctando ao BD
    include "conecta.php";

	$query=	"SELECT nome, login, senha from usuario WHERE  login=? AND senha=? AND aprovacao = 1";

	if($stmt = mysqli_prepare($conexao, $query)) {
		mysqli_stmt_bind_param($stmt, "ss", $usuario, $senha);	
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $nome, $login, $senhabd);
		mysqli_stmt_fetch($stmt);
	  
		if ($usuario == $login && $senha == $senhabd) {
			$_SESSION['usuario'] = $usuario;
			$_SESSION['senha'] = $senha;
			$_SESSION['nome'] = $nome;
			 header('location:index.php');
		}	  
		else {
			echo "Usuario ou senha incorretos.<br>";
			echo '<a href="javascript:window.history.go(-1)">Voltar</a>';
		}
		mysqli_stmt_close($stmt);
	} else {
	
	
		echo "Falha no statment<br>";
		echo '<a href="javascript:window.history.go(-1)">Voltar</a>';
	}
	mysqli_close($conexao);
?>


