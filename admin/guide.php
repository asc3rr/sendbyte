<?php
    session_start();

    if(!isset($_SESSION['isLogged'])){
        header("Location: ../");
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">

    <title>Instrukcja tworzenia wpisów</title>

    <link rel="stylesheet" href="../css/all.css">    
    <link rel="stylesheet" href="../css/index.css">    
</head>
<body>
    <h3>Wstawianie kodu</h3>
        Do textarea wpisać:<br />
        <p id="strange-things">
            <?php echo htmlspecialchars("<?php"); ?>
            $string = <?php echo htmlspecialchars("<<<ENDL") ?><br />
                --- code ---<br />
            ENDL;<br />
            <br />
            echo htmlspecialchars($string);
            <br />   
            <?php echo htmlspecialchars("?>"); ?>
        </p>

    <h3>Wstawienie linku</h3>
    <p>
        <?php 
            $string = <<<ENDL
                <a href="---link---">Link name</a>
            ENDL;
            
            echo htmlspecialchars($string);
        ?>
    </p>

    <h3>Pozostałe</h3>
    Wszystko wstawia się tak jak w htmlu.
</body>
</html>