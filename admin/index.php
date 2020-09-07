<?php
    require_once "../connect.php";
    session_start();

    $client_ip = $_SERVER['REMOTE_ADDR'];

    if($client_ip === "127.0.0.1"){
        $_SESSION["isLogged"] = true;
        $date = date();

        $insert_sql = "INSERT INTO `login_log`(`date`, `ip_address`) VALUES ($date, $client_ip)";

        header("Location: main.php");
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">

    <title>blog.sendbyte - Admin</title>

    <link rel="icon" href="../favicon.png">

    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/all.css">
</head>
<body>
    <h3>Zaloguj się</h3>
    <form action="login.php" method="post">
        Login: <input type="login" placeholder="Login" name="login"><br />
        <br />
        Hasło: <input type="password" placeholder="Hasło" name="password"><br />
        <br />
        <input type="submit" value="Zaloguj się">
    </form>
    <div id="footer">
        &copy <?php echo date("Y"); ?> sendbyte.pl
    </div>
</body>
</html>