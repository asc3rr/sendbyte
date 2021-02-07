<?php 
    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">

    <title>sendbyte - Blog informatyczny</title>

    <link rel="icon" href="favicon.png">

    <link rel="stylesheet" href="css/index.css" type="text/css">
    <link rel="stylesheet" href="css/all.css" type="text/css">
    <link rel="stylesheet" href="css/fontello/css/fontello.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 

    <?php
        if(isMobile()){
            echo '<link rel="stylesheet" href="css/mobile.css" type="text/css">';
        }
    ?>

    <script src="js/sendbyte-caption.js"></script>
</head>
<body onload="write_logo()">
    <div id="logo">
        <span id="logo-caption">sendbyte - Blog informatyczny</span>
        <div id="buttons">
            <a class="button" href="artykuly/">Najnowsze wpisy</a>
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
        <div id="name">Borys Gnaciński - Blog informatyczny</div>
        <div id="description">
            Cześć. Jestem Borys, mam 14 lat i mieszkam we Wrocławiu.<br />
        
            <h4>W jakich językach progamuję?</h4>
            <p>
                Programuję w PHP i w Pythonie. Interesuję się również administracją systemami.
            </p>

            <h4>Co będzie pojawiać się na blogu?</h4>
            <p>
                Na tym blogu znajdziecie wpisy na temat programowania - różne ciekawostki, przygody podczas programowania oraz różne porady czy tutoriale dotyczące programowania i administracji.
                <br />
                <br />
                Od czasu do czasu będą pojawiały się newsy ze świata IT.
            </p>
            <p>
        </div>
    </main>
    <div id="footer">
        &copy <?php echo date("Y"); ?> sendbyte.pl
    </div>
</body>
</html>
