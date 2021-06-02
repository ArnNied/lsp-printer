<?php

require_once "../conn.php";

if (isset($_POST['user_login'], $_POST['username'], $_POST['password'])
    and !logged_in()) {
    
    $username = clean_str($_POST['username']);
    $password = clean_str($_POST['password']);

    $user = query("SELECT * FROM `users` WHERE `username`='$username'");

    if(!$user) {
        alert("Username tidak terdaftar", BASE_VIEWS."auth/login.php");
    }

    if(password_verify($password, $user[0]['password'])) {
        $_SESSION['user'] = $user[0];
        $_SESSION['is_authenticated'] = TRUE;
        alert("Login berhasil!", BASE_VIEWS."pages/index.php");
    } else {
        alert("Password salah!", BASE_VIEWS."auth/login.php");
    }
    
} else {
    alert("Something went wrong!", BASE_VIEWS."auth/login.php");
}


?>