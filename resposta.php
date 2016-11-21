<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
<link rel="stylesheet" type="text/css" href="/css/menu.css">
<link rel="stylesheet" type="text/css" href="/css/textos.css">
<background-color: black>
</head>
<body bgcolor="black" font >
<font color="white">
    
<style>
body {
    background-image: url("/imgs/contos-de-fadas.jpg");
    background-repeat:no-repeat;
    background-size:cover;
}
</style>

<?php  include"menu.inc";
    
    include "conecta.php";
    
	echo "<h2>";
	
	if(isset($_POST['apagarSugestao'])){
	
	$sugestaoid = $_POST["sugestaoid"];
	
	$query="DELETE FROM sugestao WHERE sugestaoid=?";

	if($stmt = mysqli_prepare($conexao, $query)) {
		mysqli_stmt_bind_param($stmt, "i", $sugestaoid);	
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		
		echo "Sugestão apagada";
		 
	    } else {
		echo "Falha no statment";
	}
	//sugestaoid
	    
	}
	elseif(isset($_POST['atualizarUsuario'])){
	
	$usuarioid = $_POST["usuarioid"];
	$nome = $_POST["nome"];
	$login = $_POST["login"];
	$senha = sha1(strip_tags($_POST["senha"]));
	$email = $_POST["email"];
	$aprovacao = $_POST["aprovacao"];
	
	$query="UPDATE usuario set nome=?,login=?,senha=?,email=?aprovacao=? WHERE usuarioid=?";

	if($stmt = mysqli_prepare($conexao, $query)) {
		mysqli_stmt_bind_param($stmt, "ssssii", $nome,$login,$senha,$email,$aprovacao,$usuarioid);	
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		
		echo "Usuário atualizado";
		 
	    } else {
		echo "Falha no statment";
	    }
	    
	}
	elseif(isset($_POST['apagarUsuario'])){
	
	$usuarioid = $_POST["usuarioid"];
	
	$query="UPDATE usuario set aprovacao = 0 WHERE usuarioid=?";

	if($stmt = mysqli_prepare($conexao, $query)) {
		mysqli_stmt_bind_param($stmt, "i", $usuarioid);	
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		
		echo "Usuário desativado";
		 
	    } else {
		echo "Falha no statment";
	    }
	    
	}
	elseif(isset($_POST['autorizarConto'])){
	
	$contoid = $_POST["contoid"];
	
	$query="UPDATE contos set aprovacao=1 WHERE contoid=?";

	if($stmt = mysqli_prepare($conexao, $query)) {
		mysqli_stmt_bind_param($stmt, "i", $contoid);	
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		
		echo "Conto autorizado";
		 
	    } else {
		echo "Falha no statment";
	    }
	    
	}
	elseif(isset($_POST['apagarConto'])){
	    
	$contoid = $_POST["contoid"];
	
	$query="DELETE FROM contos WHERE contoid=?";

	if($stmt = mysqli_prepare($conexao, $query)) {
		mysqli_stmt_bind_param($stmt, "i", $contoid);	
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		
		echo "Conto apagado";
		 
	    } else {
		echo "Falha no statment";
	}
	    
	}
	elseif(isset($_POST['autorizarLeitor'])){
	
	//muralid
	
	$muralid = $_POST["muralid"];
	
	$query="UPDATE mural set aprovacao=1 WHERE muralid=?";

	if($stmt = mysqli_prepare($conexao, $query)) {
		mysqli_stmt_bind_param($stmt, "i", $muralid);	
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		
		echo "Leitor autorizado";
		 
	    } else {
		echo "Falha no statment";
	    }
	    
	}
	elseif(isset($_POST['apagarLeitor'])){
	
	//muralid
	
	$muralid = $_POST["muralid"];
	
	$query="DELETE FROM mural WHERE muralid=?";

	if($stmt = mysqli_prepare($conexao, $query)) {
		mysqli_stmt_bind_param($stmt, "i", $muralid);	
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		
		echo "Leitor apagado";
		 
	    } else {
		echo "Falha no statment";
	}
	    
	}
	
	echo "</h2>";
	
	mysqli_close($conexao);
	
        ?>
    </body>
</html>