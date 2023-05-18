<?php
    session_start();
    if (isset($_POST['sendBtn'])) {
        require "../model/connectDB.php";
        $nameVideo = $_POST['nameVideo'];
        $descriptionVideo = $_POST['descriptionVideo'];
        $uploadVideo = $_FILES['uploadVideo']['name'];
        $moduleIdentifier = $_POST['moduleIdentifier'];
        $moduleDescription = $_POST['moduleDescription'];
        $query = "SELECT nomeVideo, descricaoVideo, upload, identificadorModulo, descricaoModulo FROM videos INNER JOIN informacoesModulos ON videos.id = informacoesModulos.moduloVideo WHERE nomeVideo = '$nameVideo' AND descricaoVideo = '$descriptionVideo' AND upload = '$uploadVideo' AND identificadorModulo = '$moduleIdentifier' AND descricaoModulo = '$moduleDescription';";
        $result = $connection->query($query);
        if ($result->num_rows == 1) {
            $_SESSION['tokenAdminUser'] = TRUE;
            header("location: ../view/courseContentView.php");
            die();
        } else {
            $supportedFormats = array("mp4", "m4v", "webm", "ogv");
            $videoNameWithExtension = $_FILES['uploadVideo']['name'];
            $videoExtension = pathinfo($videoNameWithExtension, PATHINFO_EXTENSION);
            if (in_array($videoExtension, $supportedFormats)) {
                move_uploaded_file($_FILES['uploadVideo']['tmp_name'], "../assets/videos/".$videoNameWithExtension);
                $connection->begin_transaction();
                try {
                    $querySqlCode1 = "INSERT INTO videos (nomeVideo, descricaoVideo, upload) VALUES ('$nameVideo', '$descriptionVideo', '$uploadVideo');";
                    $connection->query($querySqlCode1);
                    $foreignKey = $connection->insert_id;
                    $querySqlCode2 = "INSERT INTO informacoesModulos (identificadorModulo, descricaoModulo, moduloVideo) VALUES ($moduleIdentifier, '$moduleDescription', $foreignKey);";
                    $connection->query($querySqlCode2);
                    $connection->commit();
                    echo "Dados inseridos com sucesso!";
                } catch (Exception $error) {
                    $connection->rollback();
                    echo "Erro ao inserir dados: ".$error->getMessage();
                }
                $connection->close();
                $_SESSION['tokenAdminUser'] = TRUE;
                header("location: ../view/courseContentView.php");
            } else {
                $_SESSION['allowedFormatError'] = TRUE;
                header("location: ../view/loginForm.php");
            }
        }
    }
?>