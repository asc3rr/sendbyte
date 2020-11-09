<?php
    require_once "../connect.php";
    
    session_start();

    if(!isset($_SESSION['isLogged'])){
        header("Location: ../");
    }

    if(!isset($_POST['title']) || !isset($_POST['content'])){
        header("Location: main.php");
    }

    include_once("../php/db.php");
    $db = new DB();

    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d');

    $db->addArticle($title, $content, $date);

    header("Location: main.php");
?>