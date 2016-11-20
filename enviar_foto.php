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

<h1>Envie sua Foto</h1>
<p>Envie sua foto para nosso cantinho do leitor.<br>
Toda semana nosso mural de fotos será atualizado com a foto de nossos leitores mirins.<br>
Além disso, contaremos algumas curiosidades sobre cada um deles.</p>

<?php

   function insereFoto($nome, $foto)
   {
      // conectando ao BD
      include "conecta.php";

      // executando a operação de SQL
      $resultado = mysqli_query($conexao, "INSERT INTO mural(nome, foto) VALUES ('".$nome."','".$foto."')") or die("Não foi possível executar a SQL: ".mysqli_error($conexao));

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
    
			$arquivo = $_FILES['foto'];
			$tamanho_maximo=$_POST['MAX_SIZE_FILE'];		
					
			// 1. Definir os parâmetros de teste
			$tipos_aceitos = array(	"image/gif",
									"image/png",
									"image/bmp",
									"image/jpeg");
			// 2. Validar o arquivo enviado
			if($arquivo['error'] != 0) {
				echo '<p style="font-weight:bold;color:red">Erro no Upload do arquivo<br>';
				switch($arquivo['error']) {
				case  UPLOAD_ERR_INI_SIZE:
					echo 'O Arquivo excede o tamanho máximo permitido.';
					break;
				case UPLOAD_ERR_FORM_SIZE:
					echo 'O Arquivo enviado é muito grande.';
					break;
				case  UPLOAD_ERR_PARTIAL:
					echo 'O upload não foi completo.';
					break;
				case UPLOAD_ERR_NO_FILE:
					echo 'Nenhum arquivo foi informado para upload.';	
					break;
				}
				echo '</p>';
				exit;
			}
			if($arquivo['size']==0 OR $arquivo['tmp_name']==NULL) {
				echo '<p style="font-weight:bold;color:red">Nenhum arquivo enviado.</p>';
				exit;
			}
			if($arquivo['size']>$tamanho_maximo) {
				echo '<p style="font-weight:bold;color:red">O Arquivo enviado é muito grande
					(Tamanho Máximo = ' . $tamanho_maximo . ' bytes).</p>';
				exit;
			}
			if(array_search($arquivo['type'],$tipos_aceitos)===FALSE) {
				echo '<p style="font-weight:bold;color:red">O Arquivo enviado é do tipo (' . 
						$arquivo['type'] . ') não aceito para upload. 
						Os tipos aceitos são:	</p>';
				echo '<pre>';
				print_r($tipos_aceitos);
				echo '</pre>';
				exit;
			}
			// Agora podemos copiar o arquivo enviado
			if (!file_exists('imgs')) {
							mkdir('imgs', 0777, true);
						}
			$destino = 'imgs/' . $arquivo['name'];
			if(move_uploaded_file($arquivo['tmp_name'],$destino)) {
				// Tudo Ok, mostramos os dados 
				insereFoto($nome, $destino);
			}
			else {
				echo '<p style="font-weight:bold;color:red">Ocorreu um erro durante o upload</p>';
			}

}
else{
    echo '<form action="enviar_foto.php" enctype="multipart/form-data" method="post"><p>
    <fieldset>
        <legend>Dados do Leitor:</legend>
        <p><label for="nome">Nome: </label><input type="text" name="nome" size = "40"></p>
        <p><label for="foto">Foto: </label><input type="file" name="foto" id="foto" size = "41" /></p>
        <input type="hidden" name="MAX_SIZE_FILE" value="500000">
        <p><input type="submit" name="enviar" value="Enviar"></p>
    </fieldset>
    </form>';
}
?>
</font>
</body>
</html>