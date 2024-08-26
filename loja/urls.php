<?php
$current_uri = $_SERVER["REQUEST_URI"];


$uri_handler = [
    "/loja/" => login_handler(),
    "/loja/post/" => create_login()
]

$uri_handler[$current_uri];
//funções

function login_handler(){
    

    if (@$_COOKIE['username']){
        require "templates/index.html";
        echo "<br><br>bem vindo (a), ". $_COOKIE['username'];
    }
    else{
        require "templates/login.html";
    }
}


function create_login(){
    if ($_POST['username'] && @!$_COOKIE['username']){
        $nome = $_POST['username'];
        $nome_cookie = $_COOKIE['username'];
        $senha = $_POST['password'];
        $tipo = (isset($_POST['type'])) ?   $_POST['type'] : "normal";

        setcookie('username', $nome);
        criar_cadastro($nome, $senha, $tipo);
        header("Location: index.php");
  //indica local de redirecionamento

        exit();
    }
}
//abaixo codigos referentes ao redirecionamento
?>