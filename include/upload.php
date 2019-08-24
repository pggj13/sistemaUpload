<?php

if (isset($_POST['btnEnviar'])) {
    $nome = $_FILES['arquivo']['name'];
    $formato = $_FILES['arquivo']['type'];

    $nome = str_replace("", "_", $nome);
    $nome = str_replace("ã", "a", $nome);
    $nome = str_replace("Ã", "a", $nome);
    $nome = str_replace("à", "a", $nome);
    $nome = str_replace("À", "a", $nome);
    $nome = str_replace("á", "a", $nome);
    $nome = str_replace("Á", "a", $nome);
    $nome = str_replace("â", "a", $nome);
    $nome = str_replace("Â", "a", $nome);
    $nome = str_replace("é", "e", $nome);
    $nome = str_replace("É", "a", $nome);
    $nome = str_replace("è", "e", $nome);
    $nome = str_replace("È", "a", $nome);
    $nome = str_replace("ê", "e", $nome);
    $nome = str_replace("Ê", "a", $nome);
    $nome = str_replace("í", "i", $nome);
    $nome = str_replace("Í", "a", $nome);
    $nome = str_replace("ì", "i", $nome);
    $nome = str_replace("Ì", "a", $nome);
    $nome = str_replace("î", "i", $nome);
    $nome = str_replace("Î", "a", $nome);
    $nome = str_replace("ó", "o", $nome);
    $nome = str_replace("Ó", "a", $nome);
    $nome = str_replace("ò", "o", $nome);
    $nome = str_replace("Ò", "a", $nome);
    $nome = str_replace("õ", "o", $nome);
    $nome = str_replace("Õ", "a", $nome);
    $nome = str_replace("ô", "o", $nome);
    $nome = str_replace("Ô", "a", $nome);
    $nome = str_replace("ú", "u", $nome);
    $nome = str_replace("Ú", "a", $nome);
    $nome = str_replace("û", "u", $nome);
    $nome = str_replace("Û", "a", $nome);
    $nome = str_replace("ù", "u", $nome);
    $nome = str_replace("Ù", "a", $nome);
    $nome = str_replace("c", "c", $nome);
    $nome = str_replace("C", "a", $nome);

    $nome = strtolower($nome);
    $formatos = array("image/jpg", "image/png", "image/gif", "image/jpeg", "image/bmp", "image/pjpeg");
    $testeType = array_search($formato, $formatos);
    if (!$testeType) {
        echo "<script type='text/javascript'>alert('Formato inválido!')</script>";
    } else {
        if (file_exists("arquivos/$nome")) {
            $a = 1;
            while (file_exists("arquivos/[$a]$nome")) {
                $a++;
            }
            $nome = "[" . $a . "]" . $nome;
        }
    }if (move_uploaded_file($_FILES['arquivo']['tmp_name'], "" . $nome)) {
        $sql = "INSERT INTO arquivos(imagem) VALUES(:nome)";
        try {
            $read = $db->prepare($sql);
            $read->bindValue(":nome", $nome, PDO::PARAM_STR);
            if ($read->execute()) {
                echo "<script type='text/javascript'>alert('Upload realizado com sucesso!')</script>";
            } else {
                echo"<script type='text/javascript'>alert('Falha no Upload do arquivo!')</script>";
                unlink("arquivos/$nome");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        
    }
}
?>