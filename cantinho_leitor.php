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



<h1>Cantinho do Leitor</h1>
    <div align="center">
        <table>
        <tr>
            <?php $leitores=0; 
            
            
            include "conecta.php";

	        $query=	"SELECT * from mural where aprovacao = 1";

	        $resultado = mysqli_query($conexao,$query) or die ("Não consigo executar a query: ". mysqli_error());

            if($resultado) {
                while ($row = mysqli_fetch_array($resultado)){
                echo "<td align=center><img src='/" . $row['foto']. "'><br>".$row['nome']."</td>";
                $leitores++;
                if($leitores >=3){
                    echo "</tr><tr>";
                    }
                    
                }
            }
            
            echo "</tr></table>";
            
            	mysqli_close($conexao);
            
            ?>
    </div>
</form>

</font>
</body>
</html>