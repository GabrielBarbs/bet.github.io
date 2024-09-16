<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cdst.css">
    <title>Document</title>
</head>
<body>
    
    <form class="form" action="register_src.php" method="post">
        <span class="title">Registrar-se</span>
        
        <input type="text" id="usuario" name="usuario" required class="input" placeholder="Usuario">
        
        <input type="text" id="nome" name="nome" required class="input" placeholder="Nome Real">
       
        <input type="password" id="senha" name="senha" required class="input" placeholder="Senha">
        <button type="submit" class="submit">Registrar</button>
        <p>ainda não tem conta? <span><a href="">Criar</a></span></p>
        <?php
                
                    $parametros_get = $_GET;

                    // Verifica se o array de parâmetros está vazio
                    if (!empty($parametros_get)) {

                        $usuario_errado = $_GET['existe'];

                        if($usuario_errado == "undefined"){
                            echo "<p id='paragraph-to-hide' style='color: white'>Usuario ja existe!</p>";
                        }
                    }
                ## checa se esta errado e da a mensagem
        ?>
      </form>

      <script>
        function hideParagraph() {
            const paragraph = document.getElementById('paragraph-to-hide');
            paragraph.style.display = 'none';
        }

        setTimeout(hideParagraph, 3000); // define o tempo que o paragrafo do "usuario ou senha invalido" fica aparecendo
    </script>
    
</body>
</html>