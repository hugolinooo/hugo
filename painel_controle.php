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

        <h2>Painel de Controle</h2>
        <table>
        <tr><td>
        <form method="POST" action="form.php">
            <fieldset>
            <legend>Usuários Cadastrados</legend>
            <label for="operacao">Escolha uma operação para realizar:</p>
              <input type="radio" name="operacao" value="updateUsuario" checked="true">Atualizar</p>
              <input type="radio" name="operacao" value="deleteUsuario">Desativar</p>
            <input type="submit" value="Próximo &gt;&gt;" name="proximoUsuario">
        </fieldset>
        </form>
        </td>
        <td>
        <form method="POST" action="form.php">
            <fieldset>
            <legend>Contos Enviados</legend>
            <label for="operacao">Escolha uma operação para realizar:</p>
              <input type="radio" name="operacao" value="updateConto" checked="true">Autorizar</p>
              <input type="radio" name="operacao" value="deleteConto">Apagar</p>
            <input type="submit" value="Próximo &gt;&gt;" name="proximoConto">
        </fieldset>
        </form>
        </td>

        <td>
        <form method="POST" action="form.php">
            <fieldset>
            <legend>Fotos dos Leitores</legend>
            <label for="operacao">Escolha uma operação para realizar:</p>
              <input type="radio" name="operacao" value="updateLeitor" checked="true">Autorizar</p>
              <input type="radio" name="operacao" value="deleteLeitor">Apagar</p>
            <input type="submit" value="Próximo &gt;&gt;" name="proximoLeitor">
        </fieldset>
        </form>
        </td>
        <td>
        <form method="POST" action="form.php">
            <fieldset>
            <legend>Sugestões</legend>
            <label for="operacao">Escolha uma operação para realizar:</p>
              <input type="radio" name="operacao" value="selectSugestao" checked="true">Visualizar</p>
              <input type="radio" name="operacao" value="deleteSugestao">Apagar</p>
            <input type="submit" value="Próximo &gt;&gt;" name="proximoSugestao">
        </fieldset>
        </form>
        </td>
        </tr>
        </table>
    </body>
</html>