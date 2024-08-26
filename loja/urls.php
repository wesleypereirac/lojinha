<?php
$uri = $_SERVER["REQUEST_URI"];

$args = $_SERVER["QUERY_STRING"];
echo "<br><br>argumentos: ".$args;

$indices_separadores = [];
$argumentos = [];

$ponteiro = 0;
for ($i = 0; $i < strlen($args); $i++){
    if ($args[$i] == "&"){
        echo "<br><br> $args[$i] está na indice $i<br><br>";
        $argumentos[] = substr($args, $ponteiro+2,$i);
        $ponteiro = $i;

}
    }
    
print_r($argumentos);



$uri_handler = [
    "/loja/" => ""
]
?>