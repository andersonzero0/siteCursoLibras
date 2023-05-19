<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Página Principal</title>

    <style>
        .ul_index {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .ul_index > li {
            background-color: #D9CB9E;
            padding: 3px 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <header>
        <div class="conteiner_logo">
            <img src="assets/image/logo.png" alt="">
        </div>
        <nav>
            <ul class="ul_index">
                <li><a href="view/loginForm.php" hreflang="pt-br" target="_self" rel="next">Login</a></li>
                <li><a href="view/registerForm.php" hreflang="pt-br" target="_self" rel="next">Fazer Cadastro</a></li>
                <li><a href="view/courseContentView.php" hreflang="pt-br" target="_self" rel="next">Curso Libras</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Seja Bem Vindo ao Site de Cursos de Libras!</h1>
    </main>
    <footer>
        <p>&copy;Direitos Autorais. Todos os Direitos Reservados.</p>
    </footer>
</body>
</html>