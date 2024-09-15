<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_login.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <form action="login_src.php" method="POST">
                Usuario:
                <input type="text" name="username" placeholder="Insira seu usuario" required>
                <br>
                Senha:
                <input type="password" name="password" placeholder="Insira sua senha" required>
                <br>
                <button type="submit" name="submit">Enviar</button>
                <br>
                <a href="registerpage.php" style="color: black;">Registre-se</a>
                <!-- coloca algum textinho "ainda nao tem conta" e tals-->
            </form>
        </div>
    </div>
</body>
</html>