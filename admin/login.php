<?php
    session_start();

    include_once("../php/db.php");

    $login = $_POST['login'];
    $password = $_POST['password'];

    $db = new DB();

    $is_login_succeed = $db->login($login, $password);

    if($is_login_succeed){
        $_SESSION['isLogged'] = true;

        header("Location: main.php");
    }
    else{
        header("Location: index.php");
    }
?>
