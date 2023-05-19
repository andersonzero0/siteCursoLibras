<?php
    require "../model/connectDB.php";

    $modulo = $_POST['modulo'];
    $nome_video = $_POST['nome_video'];
    $descricao_video = $_POST['descricao_video'];

    $target_dir = "../assets/videos/";
    $target_file = $target_dir . basename($_FILES["src_video"]["name"]);
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if ($_FILES["src_video"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if($FileType != "mp4" && $FileType != "mkv") {
        echo "Sorry, only PDF files are allowed."; 
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["src_video"]["tmp_name"], $target_file)) {
            $src_video = htmlspecialchars( basename( $_FILES["src_video"]["name"]));

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql = "INSERT INTO videos (nome_video, descricao_video, id_moduloFK, dataVideo, src_video) VALUES ('$nome_video', '$descricao_video', $modulo, NOW(), '$src_video')";

    $connection->query($sql);

    header('location: ../view/librasCourseSettings.php');
?>