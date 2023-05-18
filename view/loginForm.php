<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Formulário de Login</h1>
    <form action="../controller/loginUserAccount.php" method="POST">
        <label for="userEmail">E-mail:</label>
        <input type="text" name="userEmail" id="userEmail" maxlength="120" placeholder="Informe o seu email" required>
        <label for="userPassword">Senha:</label>
        <input type="password" name="userPassword" id="userPassword" maxlength="80" placeholder="Digite a sua senha" required>
        <input type="submit" name="sendBtn" value="Enviar">
        <a href="registerForm.php" hreflang="pt-br" target="_self">Fazer Cadastro</a>
    </form>
    <script type="text/javascript">
        <?php
            if (isset($_SESSION['allowedFormatError'])) {
                echo file_get_contents("../assets/js/allowedFormatError.js");
            }
        ?>
    </script>
</body>
</html>