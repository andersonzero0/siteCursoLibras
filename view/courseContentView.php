<?php
    session_start();
    if (!empty($_SESSION['tokenAdminUser']) || !empty($_SESSION['tokenCommonUser'])) {
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/style.css">
        <title>Document</title>
    </head>
    <body>
        <?php include "header.php" ?>
        <main class="main_curso">
            <h1 class="h1_cursos">CURSO</h1>

            <?php

                require "../model/connectDB.php";

                $sql = "SELECT * FROM modulos   ";
                $result = $connection->query($sql);

                if($result->num_rows == 0) {

                    echo "Nao ha modulos";
                    
                } else {

                    while($row = $result->fetch_assoc()) {

                ?>

                        <div class="div_module">
                            <h2 class="">Módulo <?= $row['id'] ?></h2>
                        </div>
                        
                        <div class="conteiner_videos">
                            <p><?= $row['descricao'] ?></p>
                    
                <?php

                $id = $row['id'];

                    $sqlVideos = "SELECT * FROM videos WHERE id_moduloFK = $id";

                    $resultVideo = $connection->query($sqlVideos);

                    if($resultVideo->num_rows == 0) {

                        echo "Nao ha videos";
                        
                    } else {

                        while($rowVideo = $resultVideo->fetch_assoc()) {

                    ?>
                            <div class="conteiner_video">

                                <div>
                                    <video poster="../assets/image/background.jpg" class="video_elem" controls src="../assets/videos/<?= $rowVideo['src_video'] ?>"></video>
                                </div>

                                <div>
                                    <p class="title_video"><?= $rowVideo['nome_video'] ?></p>
                                    <p class="desc_video"><?= $rowVideo['descricao_video'] ?></p>
                                </div>
                                
                            </div>
                    <?php
                            
                        }
                        
                    }
                    ?>

                        </div>
                    
                    <?php
                        
                    }
                    
                }
                
            ?>
            
        </main>

        <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();
  </script>
    </body>
    </html>
       
<?php
    } else {
?>
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Curso de Libras</title>
        </head>
        <body>
            <nav>
                <ul>
                    <li><a href="loginForm.php" hreflang="pt-br" target="_self" rel="next">Fazer Login</a></li>
                    <li><a href="registerForm.php" hreflang="pt-br" target="_self" rel="next">Fazer Cadastro</a></li>
                </ul>
            </nav>
            <main>
                <h1>Observações:</h1>
                <p>Registre-se, faça um cadastro ou um login com a sua conta já cadastrada, seja ela uma conta administradora ou de usuário comum!</p>
                <p>Para vizualizar conteúdos de libras em nosso site, você deve ter uma conta registrada em nosso sistema.</p>
                <p>A conta de usuário(a) administrador(a) possuí prívilégios administrativos como a edição de conteúdos e/ou a vizualização do mesmo.</p>
                <p>É dado a conta de usuário(a) comum a permissão para vizualizar nossos conteúdos!</p>
            </main>
        </body>
        </html>
<?php
    }
?>