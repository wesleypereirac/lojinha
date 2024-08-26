<?php
$uri = $_SERVER["REQUEST_URI"];


$uri_handler = [
    "/loja/" => ""
]


//main
if ( @$_POST['username'] && @!$_COOKIE['username']){
  $nome = $_POST['username'];
  $nome_cookie = $_COOKIE['username'];
  $senha = $_POST['password'];
  $tipo = (isset($_POST['type'])) ? $_POST['type'] : "normal";

  setcookie('username', $nome);
  criar_cadastro($nome, $senha, $tipo);
  header("Location: index.php");
  //indica local de redirecionamento

  exit();
}

if (@$_COOKIE['username']){
  require "templates/index.html";
  echo "<br><br>bem vindo (a), ", $_COOKIE['username'];
}
else{
require "templates/login.html";
}

//abaixo codigos referentes ao redirecionamento
?>