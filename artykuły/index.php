<?php
    require_once "../connect.php";
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">

    <title>sendbyte - Blog informatyczny</title>

    <link rel="stylesheet" href="../css/index.css" type="text/css">
    <link rel="stylesheet" href="../css/articles.css" type="text/css">
    <link rel="stylesheet" href="../css/all.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 

    <script src="../js/articles-caption.js"></script>
</head>
<body onload="write_logo()">
    <div id="logo">
        <a id="login-button" href=".">sendbyte - Blog informatyczny</a>
        <div id="buttons">
            <a class="button" href="../">Strona główna</a>
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
            $get_articles_sql = "SELECT * FROM articles";

            if($result = $db->query($get_articles_sql)){
                if($result->num_rows > 0){
                    $articles = array();

                    while($article_data = $result->fetch_assoc()){
                        $id = $article_data['id'];
                        $title = $article_data['title'];
                        $content = substr(nl2br($article_data['content']), 0, 197);

                        array_push($articles, array($id, $title, $content));
                    }

                    foreach(array_reverse($articles) as $article_data){
                        $id = $article_data[0];
                        $title = $article_data[1];
                        $content = $article_data[2];

                        echo <<<ENDL
                        <div class="article" onclick="location.href='artykuł.php?id=$id'">
                            <span class="article-title">$title</span><br />
                            <br />
                            <span class="article-content">$content...</span>
                        </div>
                        ENDL;
                    }
                }
                else{
                    echo "Nie znaleźliśmy żadnych artykułów.";
                }
            }
        ?>
        </div>
    </main>
    <div id="footer">
        &copy <?php echo date("Y"); ?> sendbyte.pl
    </div>
</body>
</html>