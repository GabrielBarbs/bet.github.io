<?php
    session_start();

    if((!isset($_SESSION['senha']) == true)){
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);  
        unset($_SESSION['classe']);
        unset($_SESSION['saldo']);
        header('Location: main2/login.php');
        exit();
    }else{
        $usuario_atual = $_SESSION['usuario'];
        $saldo_atual = $_SESSION['saldo'];
    }
 ## checa se o usuario esta logado
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main/bet.css">
    <title>BET Ifsp</title>
</head>
<body>
    
    
<header>
<div class="interface">
   <div class="logo">
    <a href="#"><img src="img/image.png" alt="" height="70px" width="95px"></a>
   </div>
   <div class="ini">
    <ul>
        <li><a href="">INICIAL</a></li>
    </ul>
   </div>
   <nav class="desk">
    <ul>
        <li><a href="main/ranking.php">RANKING</a></li>
        <li><a href="">REVIEWS</a></li>
        <li><a href="">SOBRE NÓS</a></li>
    </ul>
   </nav>
   <div class="cads">
   <img src="img/usuario_face.png" alt="" style="width: 50px; height: 50px;padding: 10px;border-radius: 50%;">
        <?php
        echo "Bem vindo: $usuario_atual <br>";
        echo "Saldo: $saldo_atual";
        ?>
   </div>
</div>
</header>

<main>
    <div class="slide">
    </div>

    <section class="dia">
  <form action="" class="bsc">
    <div class="search-wrapper">  <input type="text" placeholder="Buscar Dia" required>
      <button type="submit" class="btn btn-primary">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
        </svg>
      </button>
    </div>
  </form>
</section>

    <section class="dias">
        <button class="bloco">04/09</button>
        <button class="bloco">05/09</button>
        <button class="bloco">06/09</button>
        <button class="bloco">07/09</button>
        <button class="bloco">08/09</button>
        <button class="bloco">09/09</button>
        <button class="bloco">10/09</button>
        <button class="bloco">11/09</button>
        <button class="bloco">12/09</button>
        <button class="bloco">13/09</button>
        <button class="bloco">14/09</button>
        <button class="bloco">15/09</button>
    </section>

    <div class="informacoes">
        <p>Informaçôes do dia</p>
    </div>
</main>

<footer class="footer">
    <div class="contact-info">
        <a href="mailto:seuemail@example.com"><i class="bi bi-envelope"></i></a>
        <a href="https://github.com/seuusuario" target="_blank"><i class="bi bi-github"></i></a>
        <a href="https://instagram.com/seuusuario" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="tel:+5511999999999"><i class="bi bi-phone-fill"></i></a>
    </div>
    <div class="falacmg">
        <a style="margin: 5px auto;" href="main/contato.php">Fala Comigo</a>
    </div>
    <div class="direitos">
        <p style="margin-bottom: 5px;">2024 Gabriel Marques, Gabriel Barbosa e Gustavo Cestari. Todos os direitos reservados</p>
    </div>

    <a style="margin: 5px auto;" href="main2/dashboard/dashboard.php">DashBoard</a>
</footer>




<script>
        function mascararSaldo() {
            var saldoElement = document.getElementById("saldo");
            if (saldoElement.textContent === "***") {
                saldoElement.textContent = <?php echo $saldo_atual;?>;
            } else {
                saldoElement.textContent = "***";
            }
        }   
</script>
</body>
</html>