<?php
$db = new PDO('sqlite:usuarios.db');

if (!isset($_POST['submit'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha']; // Hashing da senha para segurança

    # Função para verificar se o usuário existe
    function checa_usuario_existe($db, $usuario) {
        $stmt = $db->prepare('SELECT * FROM usuarios WHERE username = :usuario');
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        return $stmt->fetch();
    }

    if (checa_usuario_existe($db, $usuario)) {
        echo "Usuário já existe!";
        ## usuario existe!!
    } else {
        // Inserindo o novo usuário com prepared statements para evitar injeção SQL
        $stmt = $db->prepare("INSERT INTO usuarios (username, password, saldo, classe) VALUES (:usuario, :senha, 100.0, 'n')");
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha', $senha);
        if ($stmt->execute()) {
            header('Location: login.php');
        } else {
            echo "Erro ao cadastrar usuário.";
        }
    }
}