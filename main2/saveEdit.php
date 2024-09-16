<?php

$db = new PDO('sqlite:usuarios.db');

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $usuario = $_POST['username'];
    $senha = $_POST['password'];
    $saldo = $_POST['saldo'];
    $admin = $_POST['OPCAO'];

    $result = $db->query("UPDATE usuarios SET username='$usuario', password='$senha',saldo='$saldo',classe='$admin' WHERE ID=$id");
}

header('Location: dashboard.php');

?>