<?php
$uri = $_SERVER["REQUEST_URI"];


$uri_handler = [
    "/loja/" => ""
]

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

?>