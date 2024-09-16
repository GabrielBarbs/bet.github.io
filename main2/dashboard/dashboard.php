<?php
    session_start();

    if((!isset($_SESSION['senha']) == true)){
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);  
        unset($_SESSION['classe']);
        unset($_SESSION['saldo']);
        header('Location: ../login/login.php');
        exit();
    }else{
        $usuario_atual = $_SESSION['usuario'];
        $saldo_atual = $_SESSION['saldo'];
        $classe_atual = $_SESSION['classe'];

        if($classe_atual != "admin"){
            header('Location: ../../index.php');
            exit();
        }else{

            $db = new PDO('sqlite:../usuarios.db');

            if(!empty($_GET['search'])){
                $data = $_GET['search'];

                $result = $db->query("SELECT * FROM usuarios WHERE ID LIKE '%data%' or username LIKE '%data' ORDER BY ID DESC");

            }else{
                $result = $db->query('SELECT * FROM usuarios ORDER BY ID DESC');
            }
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
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <p>DashBoard BetIFSP</p>
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

<div class="box-search">
            <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
            <button class="btn btn-primary" onclick="searchdata()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
            </button>
        </div>


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
        <?php
            while($userdata = $result->fetch()){
                echo "<tr>";
                echo "<td>".$userdata['ID']."</td>";
                echo "<td>".$userdata['username']."</td>";
                echo "<td>".$userdata['password']."</td>";
                echo "<td>".$userdata['saldo']."</td>";
                echo "<td>
                <a class='btn btn-sm btn-primary' href='edit.php?id=$userdata[ID]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                    </svg>
                </a>
                <a class='btn btn-sm btn-danger' href='delete.php?id=$userdata[ID]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                </svg>
                </a>
                </td>";
                echo "</tr>";
            }
        ?>
    </tbody>
    </table>
</div>

<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event){
        if(event.key === "Enter"){
            searchdata();
        }
    });

    function searchdata(){
        window.location = 'dashboard.php?search='+search.value;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>