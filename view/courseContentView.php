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
            <title>Curso de Libras</title>
        </head>
        <body>
            <nav>
                <ul>
                    <li><a href="../controller/exit.php" target="_self" hreflang="pt-br" rel="prev">Sair da Conta Administrador</a></li>
                    <li><a href="librasCourseSettings.php" target="_self" hreflang="pt-br" rel="prev">Editar Curso</a></li>
                </ul>
            </nav>
            <main>
                <?php
                    require "../model/connectDB.php";
                    $sqlCode = "SELECT * FROM videos INNER JOIN informacoesModulos ON videos.id = informacoesModulos.moduloVideo ORDER BY identificadorModulo;";
                    $result = $connection->query($sqlCode);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $moduleAmount = sizeof(array_unique((array) $row['identificadorModulo']));
                        $counter = 1;
                        while ($counter <= $moduleAmount) {
                ?>
                            <div>
                                <h1>Módulo <?php echo $row['identificadorModulo']; ?></h1>
                                <p><?php echo $row['descricaoModulo']; ?></p>
                                <?php
                                    $querySqlCode = "SELECT * FROM videos INNER JOIN informacoesModulos ON videos.id = informacoesModulos.moduloVideo WHERE identificadorModulo = '$counter' ORDER BY identificadorModulo;";
                                    $otherResult = $connection->query($querySqlCode); 
                                    while ($rowResult = $otherResult->fetch_assoc()) {
                                        if ($rowResult['identificadorModulo'] == $counter) {
                                ?>
                                        <div class="videoDetails">
                                            <h2><?php echo $rowResult['nomeVideo']; ?></h2>
                                            <p><strong>Descrição:</strong><?php echo $rowResult['descricaoVideo'] ?></p>
                                            <video controls>
                                                <source src="../assets/videos/<?php echo $rowResult['uploadVideo']; ?>" type="video/mp4">
                                                <source src="../assets/videos/<?php echo $rowResult['uploadVideo']; ?>" type="video/m4v">
                                                <source src="../assets/videos/<?php echo $rowResult['uploadVideo']; ?>" type="video/ogv">
                                                <source src="../assets/videos/<?php echo $rowResult['uploadVideo']; ?>" type="video/webm">
                                            </video>
                                        </div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                <?php
                            $counter++;
                        }
                    } else {
                ?>
                    <p>Não há conteúdos de libras disponíveis no momento, torne-se um administrador ou contate-o para mais conteúdos!</p>
                <?php
                    }
                ?>
            </main>
        </body>
        </html>
<?php
    } else if (!empty($_SESSION['tokenCommonUser'])) {
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
                    <li><a href="../controller/exit.php" target="_self" hreflang="pt-br" rel="prev">Sair da Conta Usuário Comum</a></li>
                </ul>
            </nav>
            <main>
                <?php
                    require "../model/connectDB.php";
                    $sqlCode = "SELECT * FROM videos INNER JOIN informacoesModulos ON videos.id = informacoesModulos.moduloVideo ORDER BY identificadorModulo;";
                    $result = $connection->query($sqlCode);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $moduleAmount = sizeof(array_unique((array) $row['identificadorModulo']));
                        $counter = 1;
                        while ($counter <= $moduleAmount) {
                ?>
                            <div>
                                <h1>Módulo <?php echo $row['identificadorModulo']; ?></h1>
                                <p><?php echo $row['descricaoModulo']; ?></p>
                                <?php
                                    $querySqlCode = "SELECT * FROM videos INNER JOIN informacoesModulos ON videos.id = informacoesModulos.moduloVideo WHERE identificadorModulo = '$counter' ORDER BY identificadorModulo;";
                                    $otherResult = $connection->query($querySqlCode); 
                                    while ($rowResult = $otherResult->fetch_assoc()) {
                                        if ($rowResult['identificadorModulo'] == $counter) {
                                ?>
                                        <div class="videoDetails">
                                            <h2><?php echo $rowResult['nomeVideo']; ?></h2>
                                            <p><strong>Descrição:</strong><?php echo $rowResult['descricaoVideo'] ?></p>
                                            <video controls>
                                                <source src="../assets/videos/<?php echo $rowResult['uploadVideo']; ?>" type="video/mp4">
                                                <source src="../assets/videos/<?php echo $rowResult['uploadVideo']; ?>" type="video/m4v">
                                                <source src="../assets/videos/<?php echo $rowResult['uploadVideo']; ?>" type="video/ogv">
                                                <source src="../assets/videos/<?php echo $rowResult['uploadVideo']; ?>" type="video/webm">
                                            </video>
                                        </div>
                                <?php
                                        }
                                    }
                                ?>
                            </div>
                <?php
                            $counter++;
                        }
                    } else {
                ?>
                        <p>Não há conteúdos de libras disponíveis no momento, torne-se um administrador ou contate-o para mais conteúdos!</p>
                <?php
                    }
                ?>
            </main>
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