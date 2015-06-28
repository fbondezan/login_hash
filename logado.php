<?php

session_start();

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once "classes/conexao.php";
require_once "classes/login.php";


if(isset($_GET['logout'])):
    if($_GET['logout'] == 'ok'):
        Login::deslogar();
    endif;
endif;

# PARA VALIDAR O ACESSO, BASTA COLOCAR ESSE SCRIPT ANTES DE TUDO #####
if(isset($_SESSION['logado'])):
?>
BEM-VINDO <?php //echo $_SESSION['administrador']; ?>
<br/>
<a href='logado.php?logout=ok'>Sair</a>
<?php
else:
    echo "Você não tem permissão de acesso";
    exit;
endif;

?>

<html>
    <head>
        <title>LOGADO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css"
    </head>
    <body>
                
        <ul> 
            <li><a href="cadastro.php">CADASTRAR USUÁRIO</a></li>
        </ul>
    </body>
</html>