<?php

require_once "../conn.php";

if (isset($_POST['user_register'], $_POST['username'], $_POST['password'], $_POST['confirm_password'])
    and !logged_in()
    and !empty($_POST['username'])
    and !empty($_POST['password'])
    and !empty($_POST['confirm_password'])) {
    
    $username = clean_str($_POST['username']);
    $password = clean_str($_POST['password']);
    $confirm_pass = clean_str($_POST['confirm_password']);
    $role = clean_str(arr_default($_POST, ['role'], 'customer'));

    $user = query("SELECT `username` FROM `users` WHERE `username`='$username'");

    if($user) {
        alert("Username sudah terdaftar", BASE_VIEWS."auth/register.php");
    }

    if($password != $confirm_pass) {
        alert("Confirm password salah", BASE_VIEWS."auth/register.php");
    }

    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

    if(query("INSERT INTO `users` (`username`, `password`, `role`) VALUES ('$username', '$hashed_pass', '$role')")) {
        alert("Registrasi berhasil! Silahkan login", BASE_VIEWS."auth/login.php");
    } else {
        alert("Something went wrong!", BASE_VIEWS."auth/register.php");
    }
    
} else {
    alert("Something went wrong!", BASE_VIEWS."auth/register.php");
}


?>