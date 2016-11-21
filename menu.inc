<header>
    <table>
    <td width= "33%">
    </td>
    <td width= "33%">
        <img src="/imgs/bannertop.png">
    </td>
    <td width= "33%" align=right>
    
    <?php
        $adm = false;
        $envia_contos = "";

    session_start(); 
		
		if(isset($_POST['sair'])){
		    unset($_SESSION['usuario']); 
			unset($_SESSION['senha']); 
			unset($_SESSION['nome']);
			session_destroy(); 
			header('location:index.php');
		}
		
		if(((isset ($_SESSION['usuario']) == true) and (isset ($_SESSION['senha']) == true))) { 
				
			$logado = $_SESSION['nome'];
			
			$envia_contos = '<a href="enviar_conto.php"><b>Envie seu conto</b></a>';
			
			if($_SESSION['usuario'] == "admin"){
			    $adm = true;
			}
        }
        
        

if(isset($_POST['enviar'])){

    $user = $_POST['login'];

    echo '<p align=“right”> Bem vindo ' . $user . '</p>'; 
    

		}
		else{
			if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)) { 
			  echo '<form action="login.php" method="POST" align="right">
				  <p><label for="login">Login:</label><input type="text" name="login" id="login" required /></p>
				  <p><label for="senha">Senha:</label><input type="password" name="senha" id="senha" maxlength="8" required/></p>
				  <p><input type="submit" name="enviar" value="ENVIAR"/></p>
		        </form>';
		    }
		    else{
		        echo '<form action="index.php" method="POST" align="right">
				  <p>Bem vindo '. $logado . '!</p>
				  <p><input type="submit" name="sair" value="Sair"/></p>
		        </form>';
		    
		    }
}

    $painel = "";

        if($adm == true){
            $painel = '<li><a href="painel_controle.php"><b>Painel de Controle</b></a></li>';
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
      <?php echo $envia_contos; ?>
      <a href="enviar_foto.php"><b>Envie sua foto</b></a>
      <a href="enviar_sugestao.php"><b>Envie sua sugestão</b></a>
    </div>
  </li>
  <li><a href="quem_somos.php"><b>Quem Somos</b></a></li>
<?php echo $painel; ?>
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


