<?php
    session_start();
    if (!empty($_SESSION['tokenAdminUser'])) {
?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Configurações do Curso</title>
        </head>
        <body>
            <nav>
                <ul>
                    <li><a href="../index.php" hreflang="pt-br" target="_self" rel="prev">Página Inicial</a></li>
                </ul>
            </nav>
            <h1>Painel do Administrador</h1>
            <form action="../controller/processingData.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>Configurações de Vídeo</legend>
                    <label for="nameVideo">Nome:</label>
                    <input type="text" name="nameVideo" id="nameVideo" maxlength="60" placeholder="Digite o nome do vídeo" required>
                    <label for="descriptionVideo">Descrição:</label>
                    <input type="text" name="descriptionVideo" id="descriptionVideo" maxlength="60" placeholder="Informe a descrição do vídeo" required>
                    <label for="uploadVideo">Upload:</label>
                    <input type="file" name="uploadVideo" id="uploadVideo" maxlength="80" placeholder="Faça o upload do vídeo" required>
                </fieldset>
                <fieldset>
                    <legend>Configurações de Módulo</legend>
                    <label for="moduleIdentifier">Número de Identificação do Módulo:</label>
                    <input type="number" name="moduleIdentifier" id="moduleIdentifier" min="1" max="100" placeholder="Digite o número do módulo" required>
                    <label for="moduleDescription">Descrição:</label>
                    <input type="text" name="moduleDescription" id="moduleDescription" maxlength="250" placeholder="Informe a descrição do módulo" required>
                </fieldset>
                <input type="submit" value="Enviar" name="sendBtn" id="sendBtn">
            </form>
        </body>
        </html>
<?php
        session_destroy();
    } else {
        header("location: loginForm.php");
    }
?>