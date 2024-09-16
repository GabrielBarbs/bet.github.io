<?php
    if(!empty($_GET['id'])){
        $db = new PDO('sqlite:usuarios.db');

        $id = $_GET['id'];

        $result = $db->query("SELECT * FROM usuarios WHERE ID=$id");

        while($userdata = $result->fetch()){
            $usuario = $userdata['username'];
            $senha = $userdata['password'];
            $saldo = $userdata['saldo'];
            $classe = $userdata['classe'];
        }
    }


    ## precisa arrumar, caso nao exista ID
?>



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
    height: 350px;
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
            <form action="saveEdit.php" method="POST">
                <h2>Editar Login</h2>
                
                <?php
                    if($classe == "n"){
                        echo "
                        <label for='admintype'>Admin Mode: </label>
                        <INPUT TYPE='RADIO' NAME='OPCAO' VALUE='admin' style='width: 10px; height: 10px; margin-left: 10px;'> Sim
                        <INPUT TYPE='RADIO' NAME='OPCAO' VALUE='n' style='width: 10px; height: 10px; margin-left: 10px;' checked> Nao
                        ";
                    }else{
                        echo "
                        <label for='admintype'>Admin Mode: </label>
                        <INPUT TYPE='RADIO' NAME='OPCAO' VALUE='admin' style='width: 10px; height: 10px;' checked> Sim
                        <INPUT TYPE='RADIO' NAME='OPCAO' VALUE='n' style='width: 10px; height: 10px;'> Nao";
                    }
                ?>

                <label for="id">Id:</label>
                <input type="text" id="id" name="id" placeholder="ID" value="<?php echo $id ?>" required style="height=10px;">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" placeholder="Insira novo usuario" value="<?php echo $usuario ?>" required>
                <br>
                <label for="password">Senha:</label>
                <input type="text" id="password" name="password" placeholder="Insira nova senha" value="<?php echo $senha ?>" required>
                <br>
                <label for="saldo">Saldo:</label>
                <input type="text" id="saldo" name="saldo" placeholder="Insira novo seldo" value="<?php echo $saldo ?>" required>
                <br>
                <button type="submit" name="submit" style="margin-top: 10px">Editar</button>
                <br>
            </form>
        </div>
    </div>
</body>
</html>