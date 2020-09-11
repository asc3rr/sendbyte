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

    $result = $db->query($get_number_of_articles_sql);

    $id = 1;

    if($result->num_rows > 0){
        while($all_data = $result->fetch_assoc()){
            $id += 1;
        }
    }

    $title = mysqli_real_escape_string($db, $_POST['title']);
    $content = mysqli_real_escape_string($db, $_POST['content']);
    $date = date('Y-m-d');

    $insert_sql = "INSERT INTO `articles`(`id`, `title`, `content`, `date`) VALUES ($id, '$title', '$content', '$date')";

    $db->query($insert_sql);

    header("Location: main.php");
?>