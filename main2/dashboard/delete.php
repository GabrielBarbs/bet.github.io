<?php
    if(!empty($_GET['id'])){
        $db = new PDO('sqlite:../usuarios.db');

        $id = $_GET['id'];

        $result = $db->query("DELETE FROM usuarios WHERE ID=$id");
    }

    header('Location: dashboard.php');


    ## precisa arrumar, caso nao exista ID
?>