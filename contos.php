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

<h1>Quem conta um conto, aumenta um ponto</h1>
<p>Dom Lustosa, certa vez, registrou o seguinte texto:<br>
<br>
Um menino viu um casaca-de-couro em um pé de papoula.<br>
Chegando perto viu um ninho com dois ovinhos e um filhotinho; mas uma cobra verde comeu o filhotinho; ele quis matar a cobra mas não conseguiu porque ela fugiu.<br>
<br>
Um companheiro ouviu contar esse fato e passou adiante dizendo:<br>
Um menino de casaca-de-couro encontrou um ninho com dois ovinhos verdes e um filhotinho de cobra; ele quis matar o passarinho, mas não poude; comeu a papoula e fugiu.<br>
<br>
Este companheiro, depois de ouvir essa história, a contou a outro colega desta forma:<br>
Um menino verde encontrou um ninho de papoula com duas cobrinhas de casaca-de-couro; o passarinho comeu a cobra e o menino comeu dois ovinhos.<br>
<br>
Já este colega narrou a história desta outra maneira:<br>
Uma cobra de casaca-de-couro viu um passarinho num pé de papoula que queria matar um menino verde, mas este saiu do ninho e comeu a cobra.<br>


<h1>Contos Enviados</h1>
    <div align="center">
        <br><table>
            <?php
            
            
            include "conecta.php";

	        $query=	"SELECT * from contos where aprovacao = 1";

	        $resultado = mysqli_query($conexao,$query) or die ("Não consigo executar a query: ". mysqli_error());

            if($resultado) {
                while ($row = mysqli_fetch_array($resultado)){
                echo "<tr><td><h2>Título: ". $row['titulo']. "<h2><br>".$row['texto']."</td></tr>";
                }
            }
            
            echo "</tr></table>";
            	mysqli_close($conexao);
            ?>
    </div>










</font>
</body>
</html>