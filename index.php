<?php
require_once 'conexao/connection.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Sistema de Upload:.</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet"type="text/css" href="css/estilo.css"/>
        <link rel="icon" href="img/icone.png"/>
    </head>
    <body>
        <?php
        include_once "include/upload.php";
        ?>
        <div id="geral">
            <form action=""method="post" enctype="multipart/form-data" name="formUpload">
                <div id="radio">
                    <label for="sim">Sim</label>
                    <input type="radio" name="selecionar-arquivo" id="sim" value="sim" onclick="document.formUpload.arquivo.disabled = false"/>
                    <label for="nao">Não</label>
                    <input type="radio" name="selecionar-arquivo" id="nao" value="nao" checked="checked" onclick="document.formUpload.arquivo.disabled = true"/>
                </div>
                <input type="file" name="arquivo" disabled="disabled"/>
                <div id="radio"><input type="submit"name="btnEnviar" value="enviar"></div>
            </form>
            <span style="margin-left: 5px;">Arquivos</span>
            <span style="border:solid 1px #ccc; height: 1px; width: 1000%; display: block; margin-bottom: 30px;"></span>
            <?php
            $sqlRead = "SELECT * FROM arquivos";
            try {
                $sqlReady = $db->prepare($sqlRead);
                $sqlReady->execute();
            } catch (Exception $e) {
                echo $e->getLine();
            }
            while ($rs = $sqlReady->fetch(PDO::FETCH_OBJ)) {
                ?>
                <div class="imagem">
                    <img src="<?php echo $rs->imagem ?>" width="150"/>   
                </div>
                <?php
            }
            ?> 
        </div>
    </body>
</html>
