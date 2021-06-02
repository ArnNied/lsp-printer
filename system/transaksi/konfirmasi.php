<?php

require_once "../conn.php";

if (isset($_POST['transaksi_konfirmasi'], $_POST['transaksi_id']) 
    and logged_in() == "admin"
    and !empty($_POST['transaksi_id'])) {
    
    $transaksi_id = intval(clean_str($_POST['transaksi_id']));
        
    if(query("UPDATE `transaksi` SET `status`='1' WHERE `id`='$transaksi_id'")) {
        alert("Transaksi berhasil dikonfirmasi!", BASE_VIEWS."transaksi/index.php");
    } else {
        alert("Something went wrong!", BASE_VIEWS."transaksi/index.php");
    }
    
} else {
    alert("Forbidden action!", BASE_VIEWS."transaksi/index.php");
}


?>