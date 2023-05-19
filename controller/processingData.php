<?php
    if ($_POST['btnSubmit']) {
        $descricao = $_POST['descricao'];

        require "../model/connectDB.php";

        $sql = "INSERT INTO modulos (descricao) VALUES ('$descricao')";

        $result = $connection->query($sql);

        if($result) {
            header('location: ../view/librasCourseSettings.php');
        } else {

            echo "error";
            
        }
    }
?>