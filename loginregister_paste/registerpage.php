<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_register.css">
</head>
<body>
<div class="container">
    <div class="box">
        <form action="register_src.php" method="post">
            Usuario:
            <input type="text" name="usuario" id="usuario" required>
            <br>
            Senha:
            <input type="password" name="senha" id="senha" required>
            <br>
            <button type="submit">Registrar-se</button>
        </form>
    </div>
</div>
</body>
</html>