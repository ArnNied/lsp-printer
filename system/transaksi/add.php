<?php

require_once "../conn.php";

if (isset($_POST['transaksi_add'], $_POST['printer_id'], $_POST['jumlah_beli']) 
    and logged_in(BASE_VIEWS."pages/index.php") == "customer"
    and !empty($_POST['printer_id'])
    and !empty($_POST['jumlah_beli'])
    ) {
    
    $user_id = $_SESSION['user']['id'];
    $printer_id = intval(clean_str($_POST['printer_id']));
    $jumlah_beli = intval(clean_str($_POST['jumlah_beli']));
    $total_harga = intval(query("SELECT `harga` FROM `printer` WHERE `id`='$printer_id'", TRUE)['harga']) * $jumlah_beli;

    if($jumlah_beli <= 0) {
        alert("Jumlah beli harus diatas 0", BASE_VIEWS."printer/index.php");
    }

    if(query("INSERT INTO `transaksi` (`user_id`, `printer_id`, `jumlah`, `total_harga`) VALUES ('$user_id', '$printer_id', '$jumlah_beli', '$total_harga')")) {
        alert("Order telah diterima, silahkan transfer dan tunggu konfirmasi!", BASE_VIEWS."transaksi/index.php");
    } else {
        alert("Something went wrong!", BASE_VIEWS."printer/index.php");
    }

} else {
    alert("Forbidden action!", BASE_VIEWS."printer/index.php");
}


?>