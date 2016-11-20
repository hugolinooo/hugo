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

<h1>Envie seu Conto</h1>
<p>Todo mês iremos ler uma história, um conto ou uma fábula bem legal!<br>
Poderemos ler a sua também, caso tenha uma historinha ou quiser reinventar alguma conhecida, poderá contar nessa coluna, nos escreva agora mesmo!<br>
Além disso, contaremos algumas curiosidades relacionadas às histórias e contos.</p>

<?php

   function insereConto($usuario, $titulo, $conto)
   {
      // conectando ao BD
      include "conecta.php";

      // executando a operação de SQL
      $resultado = mysqli_query($conexao, "INSERT INTO contos(usuario, titulo, texto) VALUES ('".$usuario."','".$titulo."','".$texto."')") or die("Não foi possível executar a SQL: ".mysqli_error($conexao));

      if ($resultado === TRUE){
            echo "<br/>O conto foi cadastrado com sucesso!";
      } else {
            echo "<br/>Erro no cadastro!";
      }
      // fechamento da conexão   
      mysqli_close($conexao);
   }

if(isset($_POST['enviar'])){
    if (isset($_SESSION['usuario'])){
        
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $usuario = $_SESSION["login"];
    
        insereConto($usuario, $titulo, $texto);
    
        echo "Dados enviados com sucesso!";
    }
    else{
        echo "Faça login para ter direito a carregar contos!";
    }
}
else{

    echo '<form action="enviar_conto.php" enctype="multipart/form-data" method="post"><p>
    <fieldset>
        <legend>Dados do Conto:</legend>
        <p><label for="titulo">Título: </label><input type="text" name="titulo" size="40"></p>
        <p><label for="conto">Conto: </label></p>
        <textarea name="conto" rows="8" cols="50" placeholder="Escreva seu conto aqui.">
        </textarea>
        <p><label for="foto">Imagem: </label><input type="file" name="imagem" id="imagem" size = "41" /></p>
        <input type="hidden" name="MAX_SIZE_FILE" value="100000">
        <p><input type="submit" name="enviar" value="Enviar"></p>
    </fieldset>
    </form>';
}
?>
</font>
</body>
</html>