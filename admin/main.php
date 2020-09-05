<?php
    require_once "../connect.php";

    session_start();

    if(!isset($_SESSION['isLogged'])){
        header("Location: ../");
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">

    <title>blog.sendbyte - Admin</title>

    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/all.css">
</head>
<body>
    <a href="guide.php" target="_blank">Instrukcja</a>
    <h2>Dodaj artykuł</h2>
    <form action="add-article.php" method="post">
        Tytuł: <input type="text" placeholder="Tytuł" name="title"><br />
        <br />
        Tekst:<br /> <textarea name="content" placeholder="Tekst"></textarea><br />
        <br />
        <input type="submit" value="Dodaj wpis">
    </form>
</body>
</html>