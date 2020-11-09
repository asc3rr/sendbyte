<?php
    require_once "../connect.php";
    
    session_start();

    if(!isset($_SESSION['isLogged'])){
        header("Location: ../");
    }

    if(!isset($_POST['title']) || !isset($_POST['content'])){
        header("Location: main.php");
    }

    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d');

    include_once("../php/parsedown.php");
    include_once("../php/db.php");

    $parser = new Parsedown();
    $db = new DB();

    $parsed_content = $parser->text($content);
    $db->addArticle($title, $parsed_content, $date);

    header("Location: main.php");
?>