<?php

require_once "../conn.php";

if (isset($_POST['transaksi_delete'], $_POST['transaksi_id']) 
    and logged_in(BASE_VIEWS."pages/index.php")
    and !empty($_POST['transaksi_id'])) {

    $transaksi_id = intval(clean_str($_POST['transaksi_id']));

    $transaksi = query("SELECT * FROM `transaksi` WHERE `id`='$transaksi_id'", TRUE);

    if(logged_in() == "admin" || $_SESSION['user']['id'] == $transaksi['user_id']) {
        if(query("DELETE FROM `transaksi` WHERE `id`='$transaksi_id'")) {
            alert("Transaksi berhasil dihapus!", BASE_VIEWS."transaksi/index.php");
        } else {
            alert("Something went wrong!", BASE_VIEWS."transaksi/index.php");
        }
    } else {
        alert("Forbidden action!", BASE_VIEWS."transaksi/index.php");
    }

} else {
    alert("Forbidden action!", BASE_VIEWS."transaksi/index.php");
}


?>