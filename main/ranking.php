<?php
    session_start();

    if((!isset($_SESSION['senha']) == true)){
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);  
        unset($_SESSION['classe']);
        unset($_SESSION['saldo']);
        header('Location: loginregister_paste/login.php');
        exit();
    }else{
        $usuario_atual = $_SESSION['usuario'];
        $saldo_atual = $_SESSION['saldo'];
    }
 ## checa se o usuario esta logado
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ranking.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>

    <header>
        <div class="interface">
           <div class="logo">
            <a href="#"><img src="img/0609b1d7-4a7d-41be-bd18-081ecb35eb9e.png" alt="" height="70px" width="95px"></a>
           </div>
           <div class="ini">
            <ul>
                <li><a href="../index.php">INICIAL</a></li>
            </ul>
           </div>
           <nav class="desk">
            <ul>
                <li><a href="../index.php">VOLTAR</a></li>
                <li><a href="">REVIEWS</a></li>
                <li><a href="" >SOBRE NÓS</a></li>
            </ul>
           </nav>
           <div class="cads">
            <ul class="entrar">
                <li><a href="">ENTRAR</a></li>
            </ul>
            <button class="cadastrar">CADASTRAR</button>
           </div>
        </div>
        </header>

    <section class="ranking">
        <div class="fundo">
        <div class="img-podio">
            <img src="img/download__10_-removebg-preview.png" alt="">
            <div class="nomes-podio">
                <p>2 colocado <br> ba...</p>
                <p>1 colocado <br> ba...</p>
                <p>3 colocado <br> ba...</p>
            </div>
        </div>
    </div>
    <div class="fundo2">
        <div class="fora-do-podio">
            <div class="fora-podio">
                <p>4 colocado ba...</p>
                <p>5 colocado ba...</p>
                <p>6 colocado ba...</p>
                <p>7 colocado ba...</p>
                <p>8 colocado ba...</p>
                <p>9 colocado ba...</p>
                <p>10 colocado ba...</p>
            </div>
        </div>
    </div>
    </section>

    <section class="usuario">
        <div class="fundo3">
            <div class="user">
                <p>xxx - sua posiçao</p>
            </div>
        </div>
        
    </section>

    <footer class="footer">
        <div class="contact-info">
            <a href="mailto:seuemail@example.com"><i class="bi bi-envelope"></i></a>
            <a href="https://github.com/seuusuario" target="_blank"><i class="bi bi-github"></i></a>
            <a href="https://instagram.com/seuusuario" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="tel:+5511999999999"><i class="bi bi-phone-fill"></i></a>
        </div>
        <div class="falacmg">
            <a style="margin: 5px auto;" href="contato.html" target="_blank">Fala Comigo</a>
        </div>
        <div class="direitos">
            <p style="margin-bottom: 5px;">2024 Gabriel Marques, Gabriel Barbosa e Gustavo Cestari. Todos os direitos reservados</p>
        </div>
    </footer>
</body>
</html>