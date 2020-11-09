<?php
    require_once "../connect.php";

    session_start();

    if(!isset($_SESSION['isLogged'])){
        header("Location: ../");
    }

    $id = $_POST['id'];

    include_once("../php/db.php");
    $db = new DB();
    $db->deleteArticle($id);

    header("Location: main.php");
?>