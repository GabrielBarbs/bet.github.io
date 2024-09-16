<?php
    session_start();

    if((!isset($_SESSION['senha']) == true)){
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);  
        unset($_SESSION['classe']);
        unset($_SESSION['saldo']);
        header('Location: ../../login/login.php');
        exit();
    }else{
        $usuario_atual = $_SESSION['usuario'];
        $saldo_atual = $_SESSION['saldo'];
        $classe_atual = $_SESSION['classe'];

        if($classe_atual != "admin"){
            header('Location: ../../../index.php');
            exit();
        }else{

            $db = new PDO('sqlite:../../usuarios.db');

            ##
        }
    }
    ## checa se o usuario esta logado e é admin
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body{
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
        }
        .table-bg{
            background: rgba(0,0,0,0.3);
            border-radius:15px 15px 0 0;
        }
        .box-search{
            display:flex;
            justify-content: center;
            gap: .1%;
        }
        .container-fluid a{
            color:white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <p>DashBoard BetIFSP</p>
        <a href="../dashboard.php">Inicio</a>
        <a href="dash_dia.php">Dias</a>
        <a href=""></a>
        <p id="time"></p>
    </div>

    <div class="d-flex">
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
    </div>
</nav>

<h1>Bem vindo, 
    <?php
        echo $usuario_atual;
    ?>!
</h1>


<script>
    var timeDisplay = document.getElementById("time");

    function refreshTime() {
    var dateString = new Date().toLocaleString("pt-BR", {timeZone: "America/Sao_Paulo"});
    var formattedString = dateString.replace(", ", " - ");
    timeDisplay.innerHTML = formattedString;
    }

    setInterval(refreshTime, 1000);
</script>

<div class="m-5">
    <table class="table text-white table-bg">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Usuario</th>
        <th scope="col">Senha</th>
        <th scope="col">Saldo</th>
        <th scope="col">...</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>