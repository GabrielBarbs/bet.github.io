<?php
$db = new PDO('sqlite:../usuarios.db');

if (!isset($_POST['submit'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];

    function checa_usuario_existe($db, $usuario) {
        $stmt = $db->prepare('SELECT * FROM usuarios WHERE username = :usuario');
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        return $stmt->fetch();
    }

    if (checa_usuario_existe($db, $usuario)) {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);   
        unset($_SESSION['classe']); 
        unset($_SESSION['saldo']);
        unset($_SESSION['nome']);
        echo "
        <script>
            var search = 'false';

            function searchdata(){
                window.location = 'registerpage.php?existe='+search.value;
            }
        </script>
        ";

        echo"<script> searchdata(); </script>";
    } else {
        $stmt = $db->prepare("INSERT INTO usuarios (username, password, real_name, saldo, classe) VALUES (:usuario, :senha, :nome,100.0, 'n')");
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':nome', $nome);
        if ($stmt->execute()) {
            header('Location: ../login/login.php');
        } else {
            header('Location ../../error_404.html');
        }
    }
}