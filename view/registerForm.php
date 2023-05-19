<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Cadastro</title>
</head>
<body>
    <main class="main_adm">
    <h1>Formulário de Cadastro</h1>
    <form action="../controller/insertUserRegister.php" method="POST">
        <div>
            <label for="fullNameUser">Nome Completo:</label>
            <input type="text" name="fullName" id="fullNameUser" maxlength="30" placeholder="Digite seu nome completo" required>
        </div>
        <div>
            <label for="emailUser">E-mail do Usuário:</label>
            <input type="text" name="emailUser" id="emailUser" maxlength="50" placeholder="Informe seu e-mail de cadastro" required>
        </div>
        <div>
            <label for="passwordUser">Senha de Usuário:</label>
            <input type="password" name="passwordUser" id="passwordUser" maxlength="50" placeholder="Informe sua senha de cadastro" required>
        </div>
        <select name="typeUser" id="typeUser">
            <option value="administrador">Administrador</option>
            <option value="usuario_comum">Usuário Comum</option>
        </select>
        <input class="btnEnviar" type="submit" value="Entrar" name="sendBtn" id="sendBtn">
        <a href="loginForm.php" hreflang="pt-br" target="_self">Fazer Login</a>
    </form>
    </main>
</body>
</html>