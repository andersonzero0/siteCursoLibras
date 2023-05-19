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
            <link rel="stylesheet" href="../assets/css/style.css">
            <title>Configurações do Curso</title>
        </head>
        <body>
            <nav>
                <ul>
                    <li> <i icon-name="home"></i><a href="../index.php" hreflang="pt-br" target="_self" rel="prev"> Página Inicial</a></li>
                </ul>
            </nav>

            <main class="main_adm">
            <h1>Painel do Administrador</h1>
                <fieldset>
                    <legend>Configurações de Módulo</legend>
                    <?php
                        require "../model/connectDB.php";
                        $sql = "SELECT id FROM modulos ORDER BY id DESC";
                        $result = $connection->query($sql);
                        $row = $result->fetch_assoc();
                        if($row == null) {
                            $idModule = 1;
                        } else {
                            $idModule = $row['id'] + 1;
                        }
                    ?>
                    <form action="../controller/processingData.php" method="POST">
                        <input type="hidden" name="idModule" value="<?= $idModule ?>">
                        <p>Proximo modulo a ser criado: <?= $idModule ?></p>
                        <label for="descricao"> Descrição: </label>
                        <textarea name="descricao" id="descricao" cols="30" rows="5"></textarea>
                        <input class="btnEnviar" type="submit" value="Criar Modulo" name="btnSubmit">
                    </form>
                </fieldset>


                <fieldset>
                    <legend>Postar videos</legend>

                    <form action="../controller/enviarVideo.php" method="post" enctype="multipart/form-data">

                    <label for="modulo">Modulo</label>

                            <select name="modulo" id="modulo">
                            <?php

                                $sqlListModules = "SELECT * FROM modulos";

                                $resultL = $connection->query($sqlListModules);

                                if($resultL->num_rows == 0) {
                            ?>
                                    <option value="" selected disabled>Não existe modulos criados</option>
                            <?php      
                                } else {

                                    while($rowsL = $resultL->fetch_assoc()) {

                            ?>
                                        <option value="<?= $rowsL['id'] ?>"><?= $rowsL['id'] ?></option>
                            <?php
                                        
                                    }
                                    
                                }
                            ?>
                            </select>

                            <label for="nome_video">Nome video:</label>
                            <input type="text" name="nome_video" id="nome_video" required>

                            <label for="descricao_video">Descrição video:</label>
                            <textarea name="descricao_video" id="" cols="30" rows="5" required></textarea>

                            <label for="src_video">Src(Upload) video:</label>
                            <input type="file" accept="video/*" name="src_video" id="">


                            <input class="btnEnviar" type="submit" value="Enviar" name="btnSubmit">
                         
                    </form>

                </fieldset>
                </main>

                <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();
  </script>
        </body>
        </html>
<?php
    } else {
        header("location: loginForm.php");
    }
?>