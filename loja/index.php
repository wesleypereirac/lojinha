<?php
include "urls.php";

"linha adicionada pelo github";
function criar_cadastro($nome, $senha, $tipo="normal"){

          $jsonData = file_get_contents("databases/db_cadastros.json");
          $db = json_decode($jsonData, true);
          if ($db === null) {
            die("Erro ao decodificar o JSON.");
        }
        $id_ultimo = ($db["last"] == null) ? $db["last"] : null;
    
        // Adiciona o novo cadastro
        $db[$id_ultimo + 1] = [
            "name" => $nome,
            "password" => $senha,
            "type" => $tipo,
        ];
        
        // Atualiza o último ID
        $db["last"] = $id_ultimo + 1;
        $jsonData = json_encode($db, JSON_PRETTY_PRINT);
        file_put_contents("db_cadastros.json", $jsonData);
        return;
        
}


?>
