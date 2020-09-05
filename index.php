<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">

    <title>sendbyte - Blog informatyczny</title>

    <link rel="stylesheet" href="css/index.css" type="text/css">
    <link rel="stylesheet" href="css/all.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 

    <script src="js/sendbyte-caption.js"></script>
    <script src="js/cookies-info.js"></script>
</head>
<body onload="write_logo()">
    <div id="logo">
        <a id="login-button" href=".">sendbyte - Blog informatyczny</a>
        <div id="buttons">
            <a class="button" href="artykuły/">Najnowsze wpisy</a>
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
        
            <h4>Języki w których programuję?</h4>
            <p>
                W Pythonie programuję od 2 lat, w PHP od 6 miesięcy, a w C# 3 miesięcy (Dobieram język w zależności od projektu). Interesuję się również administracją systemami.
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
        <?php echo htmlspecialchars('<code><?php echo "dupa123"?></code>'); ?>
    </main>
    <div id="cookies">
        Ninejszy serwis korzysta z plików cookies. 
        <span id="close-cookies" onclick="close_cookies_info()">
            Zamknij
        </span>
    </div>
    <div id="footer">
        &copy <?php echo date("Y"); ?> sendbyte.pl
    </div>
</body>
</html>