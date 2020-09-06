<?php
    require_once "../connect.php";
    
    session_start();

    if(!isset($_SESSION['isLogged'])){
        header("Location: ../");
    }

    if(!isset($_POST['title']) || !isset($_POST['content'])){
        header("Location: main.php");
    }

    $get_number_of_articles_sql = "SELECT * FROM articles";

    $id = $db->query($get_number_of_articles_sql)->num_rows + 1;
    $title = mysqli_real_escape_string($_POST['title']);
    $content = mysqli_real_escape_string($_POST['content']);

    $insert_sql = "INSERT INTO `articles`(`id`, `title`, `content`) VALUES ($id, '$title', '$content')";

    $db->query($insert_sql);

    header("Location: main.php");
?>