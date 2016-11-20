<?php

// conexao com o banco de dados -> mysqli_connect()
//definir a SQL a ser usada SELECT por exemplo
//executar a SQL -> mysqli_query()
//fechar a conexao -> mysqli_close()

$conexao = mysqli_connect("127.0.0.1:3306","hugopetelin","","bdcontaconto");

if (mysqli_connect_errno())
{
       echo "Não foi possível conectar: " . mysql_connect_error();
}




?>