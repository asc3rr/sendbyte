<?php
    require_once "../connect.php";
    session_start();

    $login = mysqli_real_escape_string($db, htmlentities($_POST['login'], ENT_QUOTES, "utf-8"));
    $password = mysqli_real_escape_string($db, htmlentities($_POST['password'], ENT_QUOTES, "utf-8"));

    $check_login_sql = "SELECT * FROM `admin` WHERE login='$login'";

    $result = $db->query($check_login_sql);

    if($result->num_rows > 0){
        $all_data = $result->fetch_assoc();

        if(password_verify($password, $all_data['password'])){
            $_SESSION['isLogged'] = true;
            
            header("Location: main.php");
        }
        else{
            header("Location: index.php");
        }
    }
?>
