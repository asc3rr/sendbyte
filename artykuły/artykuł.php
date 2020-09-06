<?php
    require_once "../connect.php";

    if(!isset($_GET['id'])){
        header("Location: ../artykuły/");
    }

    $id = mysqli_real_escape_string($db, htmlentities($_GET['id'], ENT_QUOTES, "utf-8"));

    $get_article_data_sql = "SELECT * FROM articles WHERE id=$id";

    if($result = $db->query($get_article_data_sql)){
        if($result->num_rows > 0){
            $all_data = $result->fetch_assoc();

            $title = $all_data['title'];
            $content = $all_data['content'];
            $date = $all_data['date'];
        }
        else{
            header("Location: ../artykuły/");
        }
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">

    <title>sendbyte - Blog informatyczny</title>

    <link rel="stylesheet" href="../css/index.css" type="text/css">
    <link rel="stylesheet" href="../css/view-article.css" type="text/css">
    <link rel="stylesheet" href="../css/all.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 

    <script src="../js/articles-caption.js"></script>
</head>
<body onload="write_logo()">
    <div id="logo">
        <a id="login-button" href="../">sendbyte - Blog informatyczny</a>
        <div id="buttons">
            <a class="button" href="../">Strona główna</a>
            <a class="button" href="mailto:borysgnacinski@protonmail.com">Kontakt</a>
        </div>
    </div>
    <main>
        <div id="article">
            <h3 id="article-title">
                <?php echo $title; ?>
                <span id="article-date"><?php echo $date; ?></span>
            </h3>
            <span id="article-content"><?php echo $content?></span>
        </div>
    </main>
    <div id="footer">
        &copy <?php echo date("Y"); ?> sendbyte.pl
    </div>
</body>
</html>