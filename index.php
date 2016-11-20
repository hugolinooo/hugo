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

<?php  include"menu.inc"; ?>

<h1>Bem vindo ao Conta um Conto!</h1>
<p>Cansado de ver as crianças na internet sem nada educativo ou interessante para fazer?<br>
Que tal um lugar com um monte de contos novos para exercitar a criatividade e imaginação?<br>
O "Conta um Conto" é um site criado para incentivar a leitura de crianças de todas as idades.<br>
Seja bem vindo e bom divertimento!</p>

<?php
  
  function insereUsuario($nome, $login, $senha, $email, $foto)
  {
      // conectando ao BD
      include "conecta.php";

      // executando a operação de SQL
      $resultado = mysqli_query($conexao, "INSERT INTO usuario(nome, login, senha, email, foto) VALUES ('".$nome."','".$login."','".$senha."','".$email."','".$foto."')") or die("Não foi possível executar a SQL: ".mysqli_error($conexao));

      if($resultado === TRUE){
            echo "<br/>Usuário cadastrado com sucesso!";
      } else {
            echo "<br/>Erro no cadastro!";
      }
      // fechamento da conexão   
      mysqli_close($conexao);
  }


    if(isset($_POST['cadastrar']))
        {
            
        $nome = $_POST['nome'];
        $login = $_POST['login'];
        $senha = sha1(strip_tags($_POST['senha']));
        $email = $_POST['email'];
        $foto = $_FILES['foto'];
        
        
        
        insereUsuario($nome, $login, $senha, $email, $foto['name']);



            
            
    }
    else{
		echo '<form method="POST" enctype="multipart/form-data" action="index.php">
			<h3>Faça seu cadastro:</h3>
			<fieldset>
				<p><label for="nome">Nome: </label><input type="text" name="nome" id="nome" size = "40" required /></p>
				<p><label for="email">E-mail: </label><input type="email" name="email" id="email" size = "39" required /></p>
				<p><label for="login">Login: </label><input type="text" name="login" id="login" size = "40" required /></p>
				<p><label for="senha">Senha: </label><input type="password" name="senha" id="senha" size = "40" maxlength="8" required/></p>
				<p><label for="senha2">Confirmar Senha: </label><input type="password" name="senha2" size = "27" id="senha2" maxlength="8" required/></p>
				<p><label for="foto">Foto: </label><input type="file" name="foto" id="foto" size = "41" /></p>
				 <input type="hidden" name="MAX_SIZE_FILE" value="500000">
				<p><input type="submit" name="cadastrar" value="Cadastrar"/></p>
			</fieldset>
		</form>

    </form>';
}
?>

</font>
</body>
</html>