<?php
    require_once "../connect.php";

    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">

    <title>sendbyte - Blog informatyczny</title>

    <link rel="icon" href="../favicon.png">

    <link rel="stylesheet" href="../css/index.css" type="text/css">
    <link rel="stylesheet" href="../css/articles.css" type="text/css">
    <link rel="stylesheet" href="../css/all.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 

    <?php
        if(isMobile()){
            echo '<link rel="stylesheet" href="../css/mobile.css" type="text/css">';
        }
    ?>

    <script src="../js/articles-caption.js"></script>
</head>
<body onload="write_logo()">
    <div id="logo">
        <span id="logo-caption">sendbyte - Blog informatyczny</span>
        <div id="buttons">
            <a class="button" href="../">Strona główna</a>
            <a class="button" href="https://github.com/asc3rr/">Mój Github</a>
            <a class="button" href="mailto:borysgnacinski@protonmail.com">Kontakt</a>
        </div>
    </div>
    <main>
        <div id="top">
            <h2>
                <span id="hero-caption">sendbyte</span><span id="cursor">|</span>
            </h2>
        </div>
        <div id="articles">
        <?php
            include_once("../php/db.php");

            $db = new DB();

            $articles = $db->getArticles();

            if(sizeof($articles) === 0){
                echo "Nie znaleźliśmy żadnych artykułów";
            }

            foreach($articles as $article){
                $id = $article[0];
                $title = $article[1];
                $content = $article[2];

                echo <<<ENDL
                    <div class="article" onclick="location.href='artykul.php?id=$id'">
                        <span class="article-title">$title</span><br />
                        <br />
                        <span class="article-content">$content...</span>
                    </div>
                ENDL;
            }
        ?>
        </div>
    </main>
    <div id="footer">
        &copy <?php echo date("Y"); ?> sendbyte.pl
    </div>
</body>
</html>