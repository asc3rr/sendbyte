<?php
    require_once "../connect.php";

    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

    if(!isset($_GET['id'])){
        header("Location: ../artykuły/");
    }

    $id = $_GET['id'];

    include_once("../php/db.php");

    $db = new DB();

    $article_data = $db->getArticleData($id);

    $title = $article_data[1];
    $content = $article_data[2];
    $date = $article_data[3];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">

    <title>sendbyte - Blog informatyczny</title>

    <link rel="icon" href="../favicon.png">

    <link rel="stylesheet" href="../css/index.css" type="text/css">
    <link rel="stylesheet" href="../css/view-article.css" type="text/css">
    <link rel="stylesheet" href="../css/all.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 

    <?php
        if(isMobile()){
            echo '<link rel="stylesheet" href="../css/mobile.css" type="text/css">';
        }
    ?>
</head>
<body>
    <div id="logo">
        <span id="logo-caption">sendbyte - Blog informatyczny</span>
        <div id="buttons">
            <a class="button" href="index.php">Powrót</a>
            <a class="button" href="https://github.com/asc3rr/">Mój Github</a>
            <a class="button" href="mailto:borysgnacinski@protonmail.com">Kontakt</a>
        </div>
    </div>
    <main>
        <div id="article">
            <h3 id="article-title">
                <?php echo $title; ?>
                <span id="article-date"><?php echo $date; ?></span>
            </h3>
            <span id="article-content"><?php echo $content; ?></span>
        </div>
    </main>
    <div id="footer">
        &copy <?php echo date("Y"); ?> sendbyte.pl
    </div>
</body>
</html>