<?php
    $db = new PDO('sqlite:usuarios.db');

    if(isset($_POST['submit'])){
        $usuario = $_POST['username'];
        $senha = $_POST['password'];

        $stmt = $db->prepare('SELECT * FROM usuarios WHERE username = :usuario');
        $stmt->execute([':usuario' => $usuario]);
        $user = $stmt->fetch();

        if ($user && $user['password'] === $senha) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            $_SESSION['classe'] = $user['classe'];
            $_SESSION['saldo'] = $user['saldo'];
            header('Location: ../index.php'); // Redireciona para uma página restrita
        } else {
            // Login inválido
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);   
            unset($_SESSION['classe']); 
            unset($_SESSION['saldo']);
            echo "Usuário ou senha inválidos.";
        }
}else{
    echo "errorororor";
}
?>