<?php
    if (isset($_POST['sendBtn'])) {
        session_start();
        require "../model/connectDB.php";
        $fullNameUser = $_POST['fullName'];
        $emailUser = $_POST['emailUser'];
        $passwordUser = $_POST['passwordUser'];
        $typeUser = $_POST['typeUser'];
        $sqlCodeQuery = "SELECT * FROM usuarios WHERE nome = '$fullNameUser' AND email = '$emailUser' AND senha = '$passwordUser' AND tipo = '$typeUser';";
        $result = $connection->query($sqlCodeQuery);
        if ($result->num_rows > 0) {
            while ($rowResult = $result->fetch_assoc()) {
                if ($rowResult['nome'] == $fullNameUser && $rowResult['email'] == $emailUser && $rowResult['senha'] == $passwordUser && $rowResult['tipo'] == $typeUser) {
                    $_SESSION['registerError'] = TRUE;
                    header("location: ../view/registerForm.php");
                } else {
                    $sqlCodeInsertUserRegister = "INSERT INTO Usuarios (nome, email, senha, tipo) VALUES ('$fullNameUser', '$emailUser', '$passwordUser', '$typeUser');";
                    $connection->query($sqlCodeInsertUserRegister);
                    header("location: ../view/loginForm.php");
                }
            }
        } else {
            $sqlCodeInsertUserRegister = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES ('$fullNameUser', '$emailUser', '$passwordUser', '$typeUser');";
            $connection->query($sqlCodeInsertUserRegister);
            header("location: ../view/loginForm.php");
        }
    }
?>