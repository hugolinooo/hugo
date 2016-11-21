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

$operacao=$_POST["operacao"];

//SUGESTAO

if($operacao=='selectSugestao' || $operacao=="deleteSugestao"){
    
    include "conecta.php";

	$query=	"SELECT * from sugestao";

	$resultado = mysqli_query($conexao,$query)
        or die ("Não consigo executar a query: ". mysqli_error());

        if($resultado) {
            echo "<h2>Sugestões</h2>
            <br><table>";
            while ($row = mysqli_fetch_array($resultado)){
                echo "<tr><td>ID: " . $row['sugestaoid'] . "</td><td>Nome: " . $row['nome'] . "</td><td>Sugestão: " . $row['descricao'] . "</td><td>Email: " . $row['email'] . "</td></tr>";
            }
            echo "</table>";
		
	} else {
	
	    echo "Falha no statment<br>";
		echo '<a href="javascript:window.history.go(-1)">Voltar</a>';
	}
	mysqli_close($conexao);
	
	if ($operacao == "deleteSugestao"){
        echo '<p><form method="POST" action="resposta.php">
            <p><label for="sugestaoid">Informe o ID da Sugestão a ser apagada:</p>
            <input type="text" id="sugestaoid" name="sugestaoid" size = "30">
            <p><input type="submit" value="Apagar" name="apagarSugestao"></p>
        </form>';
	}
}

//USUARIO

if($operacao=='updateUsuario' || $operacao=="deleteteUsuario"){
    
    include "conecta.php";

	$query=	"SELECT * from usuario";

	$resultado = mysqli_query($conexao,$query)
        or die ("Não consigo executar a query: ". mysqli_error());

        if($resultado) {
            echo "<h2>Usuários</h2>
            <br><table>";
            

            
            while ($row = mysqli_fetch_array($resultado)){
                echo "<tr><td>ID: " . $row['usuarioid'] . "</td><td>Nome: " . $row['nome'] . "</td><td>Login: " . $row['login'] . "</td><td>Email: " . $row['email'] . "</td><td>Foto:<br><img src='/imgs/" . $row['foto']. "'> . </td><td>Aprovação: " . $row['aprovacao'] . "</td></tr>";
            }
            echo "</table>";
		
	} else {
	
	    echo "Falha no statment<br>";
		echo '<a href="javascript:window.history.go(-1)">Voltar</a>';
	}
	mysqli_close($conexao);
	
	if ($operacao == "updateUsuario"){
        echo '<p><form method="POST" action="resposta.php">
            <p><label for="usuarioid">Informe o ID do Usuário a ser atualizado:</p>
            <input type="text" id="usuarioid" name="usuarioid" size = "30">
            <p><label for="nome">Nome: <input type="text" id="nome" name="nome" size = "30">
            <p><label for="login">Login: <input type="text" id="login" name="login" size = "30">
            <p><label for="senha">Senha: <input type="text" id="senha" name="senha" size = "30">
            <p><label for="email">E-mail: <input type="text" id="email" name="email" size = "30">
            <p><label for="aprovacao">Aprovação: <input type="text" id="aprovacao" name="aprovacao" size = "30">
            <p><input type="submit" value="Atualizar" name="atualizarUsuario"></p>
        </form>';
	}
	
	elseif ($operacao == "deleteUsuario"){
        echo '<p><form method="POST" action="resposta.php">
            <p><label for="usuarioid">Informe o ID do Usuário a ser desativado:</p>
            <input type="text" id="usuarioid" name="usuarioid" size = "30">
            <p><input type="submit" value="Apagar" name="apagarUsuario"></p>
        </form>';
	}
}

//CONTOS

if($operacao=='updateConto' || $operacao=="deleteConto"){
    
    include "conecta.php";

	$query=	"SELECT * from contos";

	$resultado = mysqli_query($conexao,$query) or die ("Não consigo executar a query: ". mysqli_error());

        if($resultado) {
            echo "<h2>Contos</h2>
            <br><table>";
            
  
            
            while ($row = mysqli_fetch_array($resultado)){
                echo "<tr><td>ID: " . $row['contoid'] . "</td><td>Título: " . $row['titulo'] . "</td><td>ID do Usuário: " . $row['usuarioid'] . "</td><td>Aprovação: " . $row['aprovacao'] . "</td></tr><tr><td>" . $row['texto'] . "</td></tr>";
            }
            echo "</table>";
		
	} else {
	
	    echo "Falha no statment<br>";
		echo '<a href="javascript:window.history.go(-1)">Voltar</a>';
	}
	mysqli_close($conexao);
	
	if ($operacao == "updateConto"){
        echo '<p><form method="POST" action="resposta.php">
            <p><label for="contoid">Informe o ID do Conto a ser autorizado:</p>
            <input type="text" id="contoid" name="contoid" size = "30">
            <p><input type="submit" value="Autorizar" name="autorizarConto"></p>
        </form>';
	}
	
	elseif ($operacao == "deleteConto"){
        echo '<p><form method="POST" action="resposta.php">
            <p><label for="contoid">Informe o ID do Conto a ser apagado:</p>
            <input type="text" id="contoid" name="contoid" size = "30">
            <p><input type="submit" value="Apagar" name="apagarConto"></p>
        </form>';
	}
}

//MURAL

if($operacao=='updateLeitor' || $operacao=="deleteLeitor"){
    
    include "conecta.php";

	$query=	"SELECT * from mural";

	$resultado = mysqli_query($conexao,$query) or die ("Não consigo executar a query: ". mysqli_error());

        if($resultado) {
            echo "<h2>Mural de Leitores</h2>
            <br><table>";
            
            
            while ($row = mysqli_fetch_array($resultado)){
                echo "<tr><td>ID: " . $row['muralid'] . "</td><td>Nome: " . $row['nome'] . "</td><td>Foto:<br><img src='/" . $row['foto']. "'></td><td>Aprovação: " . $row['aprovacao'] . "</td></tr>";
            }
            echo "</table>";
		
	} else {
	
	    echo "Falha no statment<br>";
		echo '<a href="javascript:window.history.go(-1)">Voltar</a>';
	}
	mysqli_close($conexao);
	
	if ($operacao == "updateLeitor"){
        echo '<p><form method="POST" action="resposta.php">
            <p><label for="muralid">Informe o ID do Leitor a ser autorizado:</p>
            <input type="text" id="muralid" name="muralid" size = "30">
            <p><input type="submit" value="Autorizar" name="autorizarLeitor"></p>
        </form>';
	}
	
	elseif ($operacao == "deleteLeitor"){
        echo '<p><form method="POST" action="resposta.php">
            <p><label for="muralid">Informe o ID do Leitor a ser apagado:</p>
            <input type="text" id="contoid" name="muralid" size = "30">
            <p><input type="submit" value="Apagar" name="apagarLeitor"></p>
        </form>';
	}
}

?>
</body>
</html>