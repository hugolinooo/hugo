<header>
    <table>
    <td width= "33%">
    </td>
    <td width= "33%">
        <img src="/imgs/bannertop.png">
    </td>
    <td width= "33%">
    
    <?php
			

if(isset($_POST['enviar'])){

session_start();

$login = strip_tags($_POST['login']);
    
$senha = sha1(strip_tags($_POST['senha']));
    

// conctando ao BD
    

include "conecta.php";

	
$query="SELECT * from usuario WHERE  login=? AND senha=?";

	
if($stmt = mysqli_prepare($conexao, $query)) {

		mysqli_stmt_bind_param($stmt, "ss", $login, $senha);
	
		mysqli_stmt_execute($stmt);

		mysqli_stmt_bind_result($stmt, $usuarioid, $nome, $login1, $senha1, $foto, $email, $aprovacao);

		mysqli_stmt_fetch($stmt);

	  
		if ($login == $login1 && $senha == $senha1) {

			$_SESSION['login'] = $login;

			$_SESSION['senha'] = $senha;

			header('location:index.php');

		}
	  
		else {

			echo "Usuario ou senha incorretos";

		}

		mysqli_stmt_close($stmt);

	}
 else {
	
	echo "Falha no statment";

	}

	mysqli_close($conexao);


			
			
			
			}
			else{
			  echo '<form action="index.php" method="POST" align="right">
				  <p><label for="login">Login:</label><input type="text" name="login" id="login" required /></p>
				  <p><label for="senha">Senha:</label><input type="password" name="senha" id="senha" maxlength="8" required/></p>
				  <p><input type="submit" name="enviar" value="ENVIAR"/></p>
		  </form>';
}

      ?>
		</td>
		</table>
</header>

<ul>
  <li><a class="active" href="index.php"><b>Início</b></a></li>
  <li><a href="contos.php"><b>Contos</b></a></li>
  <li><a href="cantinho_leitor.php"><b>Cantinho do Leitor</b></a></li>
  <li class="dropdown">
    <a href="#" class="dropbtn"><b>Ajudando o Site</b></a>
    <div class="dropdown-content">
      <a href="enviar_conto.php"><b>Envie seu conto</b></a>
      <a href="enviar_foto.php"><b>Envie sua foto</b></a>
      <a href="enviar_sugestao.php"><b>Envie sua sugestão</b></a>
    </div>
  </li>
  <li><a href="quem_somos.php"><b>Quem Somos</b></a></li>
</ul>

<?php



function salvaImagem($tam, $nome, $arquivo)
{
    $retorno = false;
    
    //Define tamanho e tipos aceitos
    $tipos_aceitos = array("image/x-png","image/png", "image/jpeg", "image/gif", "image/bmp");

    //Validação do arquivo recebido
    if($arquivo['error'] != 0) //diferente de zero quer dizer que teve erro
    {
        switch($arquivo['error'])
        {
            //tamanho maior que o php suporta
            case UPLOAD_ERR_INI_SIZE:
                echo "Erro! O Arquivo excede o tamanho máximo permitido";
                exit;
                break;

            //tamanho maior que o definido no formulário
            case UPLOAD_ERR_FORM_SIZE:
                echo "Erro! Arquivo muito grande.";
                exit;
            break;

            //aqruivo não chegou completo
            case  UPLOAD_ERR_PARTIAL:
                echo "Erro! Envio não concluído.";
                exit;
            break;

            //não enviou arquivo
            case UPLOAD_ERR_NO_FILE:
                echo "Erro! Você não enviou um arquivo.";
                exit;
            break;	
        }

    } else {

        //verifica se o arquivo tem o tipo permitido
        if(array_search($arquivo['type'],$tipos_aceitos)===FALSE) {
            echo "Erro! Tipo de dados não permitido.<br/>
                    Utilize apenas JPG, PNG, BMP ou GIF".$arquivo['type'];
            exit;
        }

        //verifica se o arquivo é vazio
        if($arquivo['size']==0 OR $arquivo['tmp_name']==NULL) {
            echo "Erro! Arquivo vazio.";
            exit;
        }

        //Tamanho maior que o permitido
        if($arquivo['size']>$tam) {
            echo "Erro! Arquivo maior que o permitido.";
            exit;
        }

        //diz onde será salvo
        if (!file_exists('img/usuarios/'.$nome)) {
            mkdir('img/usuarios/'.$nome, 0777, true);
        }
        $destino = 'img/usuarios/'.$nome.'/' . $arquivo['name'];

        //move o temporário para o destino e verifica se tudo está ok
        if(  move_uploaded_file($arquivo['tmp_name'],$destino)  ) {
            $retorno = true;
        }
        else {
            echo "Erro ao salvar o arquivo.";
        }

    }
    return $retorno;
}

?>


