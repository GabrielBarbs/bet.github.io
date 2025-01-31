<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style_login.css">
</head>

<style>
    body {
    font-family: Arial, sans-serif;
    text-align: center;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.box {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

h2 {
    text-align: center;
}

label {
    display: block;
    text-align: left;
}

input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #3e8e41;
}

p {
    text-align: center;
}
</style>
<body>
    <div class="container">
        <div class="box">
            <form action="login_src.php" method="POST">
                <h2>Login</h2>
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" placeholder="Insira seu usuário" required>
                <br>
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" placeholder="Insira sua senha" required>
                <br>
                <button type="submit" name="submit">Enviar</button>
                <br>
                <p>Ainda não tem conta? <a href="../register/registerpage.php">Registre-se</a></p>
                <?php

                $parametros_get = $_GET;

                // Verifica se o array de parâmetros está vazio
                if (!empty($parametros_get)) {
                
                    $usuario_errado = $_GET['condition'];

                    if($usuario_errado == "undefined"){
                        echo "<p id='paragraph-to-hide' style='color: red'>Usuario ou senha invalido</p>";
                    }
                }
                ## checa se esta errado e da a mensagem
                ?>
            </form>
        </div>
    </div>

<script>
    function hideParagraph() {
        const paragraph = document.getElementById('paragraph-to-hide');
        paragraph.style.display = 'none';
    }

    setTimeout(hideParagraph, 3000); // define o tempo que o paragrafo do "usuario ou senha invalido" fica aparecendo
</script>

</body>
</html>