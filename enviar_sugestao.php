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

<h1>Queremos ouvir você!</h1>
<p>O que tem achado do site?<br>
Quais melhorias podemos realizar para aumentar sua satisafação?<br>
Estamos ansiosos para ouvir sua opinião!</p>

<?php

 function insereSugestao($nome, $email, $descricao)
   {
      // conectando ao BD
      include "conecta.php";

      // executando a operação de SQL
      $resultado = mysqli_query($conexao, "INSERT INTO sugestao(nome, email, descricao) VALUES ('".$nome."','".$email."','".$descricao."')") or die("Não foi possível executar a SQL: ".mysqli_error($conexao));

      if ($resultado === TRUE){
            echo "<br/>Os dados foram carregados com sucesso!";
      } else {
            echo "<br/>Erro no cadastro!";
      }
      // fechamento da conexão   
      mysqli_close($conexao);
   }


if(isset($_POST['enviar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $descricao = $_POST['descricao'];
    
    insereSugestao($nome, $email, $descricao);
}
else{
    echo '<form action="enviar_sugestao.php" method="POST"><p>
<fieldset>
    <legend>Entre com sua sugestão:</legend>
<p><label for="nome">Nome: </label><input type="text" name="nome" size="40"></p>
<p><label for="email">E-mail: </label><input type="email" name="email" size="39"></p>
<p><label for="descricao">Sugestão: </label></p>
<textarea name="descricao" rows="8" cols="50" placeholder="Escreva sua sugestão aqui."></textarea>
<p><input type="submit" name="enviar" value="Enviar"></p>
</fieldset>
</form>';
}
?>

</font>
</body>
</html>