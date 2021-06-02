<?php

require_once "../conn.php";

if(!logged_in()) {
    header("Location: ".BASE_VIEWS."pages/index.php");
    die;
}

$_SESSION = [];
session_unset();
session_destroy();

alert("Logout berhasil!", BASE_VIEWS."pages/index.php");

?>