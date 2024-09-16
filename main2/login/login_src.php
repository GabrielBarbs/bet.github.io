<?php
    $db = new PDO('sqlite:../usuarios.db');

    $msg_eroo = false;

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
            $_SESSION['nome'] = $user['nome'];
            header('Location: ../../index.php'); // Redireciona para uma página restrita
        } else {
            echo "
            <script>
                var search = 'false';

                function searchdata(){
                    window.location = 'login.php?condition='+search.value;
                }
            </script>
            ";

            echo"<script> searchdata(); </script>";
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);   
            unset($_SESSION['classe']); 
            unset($_SESSION['saldo']);
            unset($_SESSION['nome']);
        }
}else{
    header('Location: ../../error_404.html');
}
?>

