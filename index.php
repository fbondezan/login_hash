<?php
session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once "classes/conexao.php";
require_once "classes/login.php";

if(isset($_POST['ok'])):
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_MAGIC_QUOTES);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_MAGIC_QUOTES);

    $l = new Login($conexao);
    $l->setLogin($login);
    $l->setSenha($senha);
    //echo "<br/>" . $l->logar() . "<br/>";
    if($l->logar()):
        header("Location: logado.php");
    else:
           $erro = "Erro ao logar";
    endif;
    
    endif; 
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Login com PHP OO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css"
    </head>
    <body>
        <h1>LOGIN</h1>
        <div id="login">
            <form action="" method="POST" id="form_login">
                <label for="login">Login:</label>
                <input type="text" name="login" class="input" id="input_login"/>
                
                <label for="senha">Senha:</label>
                <input type="password" name="senha" class="input" id="input_senha"/>
                
                <label for="submit"></label>
                <input type="submit" name="ok" class="input_button" value="logar" id="bt_logar"/>
            </form>
            <?php echo isset($erro) ? $erro : ''; ?>
        </div>
        
    </body>
</html>
