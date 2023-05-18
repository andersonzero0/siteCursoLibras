<?php
    if (isset($_POST['sendBtn'])) {
        session_start();
        require "../model/connectDB.php";
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];
        $query = "SELECT * FROM usuarios WHERE email = '$userEmail' AND senha = '$userPassword';";
        $result = $connection->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $typeUser = $row['tipo'];
            if ($typeUser == 'administrador') {
                $_SESSION['tokenAdminUser'] = TRUE;
                header("location: ../view/librasCourseSettings.php");
                die();
            } else if ($typeUser == 'usuario_comum') {
                $_SESSION['tokenCommonUser'] = TRUE;
                header("location: ../view/courseContentView.php");
                die();
            }
        } else {
            header("location: ../view/loginForm.php");
        }
        session_destroy();
    }
?>