<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Login</title>
</head>
<body>
    <main class="main_adm">
    <h1>Formulário de Login</h1>
    <form action="../controller/loginUserAccount.php" method="POST">
        <div>
            <label for="userEmail">E-mail:</label>
            <input type="text" name="userEmail" id="userEmail" maxlength="120" placeholder="Informe o seu email" required>
        </div>
        <div>
            <label for="userPassword">Senha:</label>
            <input type="password" name="userPassword" id="userPassword" maxlength="80" placeholder="Digite a sua senha" required>
        </div>
        <input class="btnEnviar" type="submit" name="sendBtn" value="Enviar">
        <a href="registerForm.php" hreflang="pt-br" target="_self">Fazer Cadastro</a>
    </form>
    </main>
    <script type="text/javascript">
        <?php
            if (isset($_SESSION['allowedFormatError'])) {
                echo file_get_contents("../assets/js/allowedFormatError.js");
            }
        ?>
    </script>
</body>
</html>