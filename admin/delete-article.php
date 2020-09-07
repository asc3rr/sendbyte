<?php
    require_once "../connect.php";

    session_start();

    if(!isset($_SESSION['isLogged'])){
        header("Location: ../");
    }

    $id = mysqli_real_escape_string($db, $_POST['id']);

    $delete_sql = "DELETE FROM `articles` WHERE `id`=$id";

    $db->query($delete_sql);

    header("Location: main.php");
?>