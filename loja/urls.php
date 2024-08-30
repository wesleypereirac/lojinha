<?php
$current_uri = $_SERVER["REQUEST_URI"];


$uri_handler = [
    "/" => 'login_handler',
    "/?post=1" => 'create_login'];


//checa a uri
if (isset($uri_handler[$current_uri])){
    $handler = $uri_handler[$current_uri];
    call_user_func($handler);
}else {
    echo "Pagina nao encontrada";
}


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

        $nome = @$_POST['username'];
        $senha = @$_POST['password'];
        $tipo = (isset($_POST['type'])) ?   $_POST['type'] : "normal";

        setcookie('username', $nome);
        criar_cadastro($nome, $senha, $tipo);
        header("Location: /");
  //indica local de redirecionamento

        exit();
    
}
//abaixo codigos referentes ao redirecionamento
?>