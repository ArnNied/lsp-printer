<?php

require_once "../conn.php";

if (isset($_POST['printer_edit'], $_POST['printer_id'], $_POST['nama'], $_POST['spesifikasi'], $_POST['harga'])
    and logged_in() == "admin") {
    
    $id = clean_str($_POST['printer_id']);
    $nama = clean_str($_POST['nama']);
    $spesifikasi = clean_str($_POST['spesifikasi']);
    $harga = intval(clean_str($_POST['harga']));

    if($harga < 0) {
        alert("Harga printer harus diatas 0", BASE_VIEWS."printer/edit.php?id=".$id);
    }
    
    if(query("UPDATE `printer` SET `nama`='$nama', `spesifikasi`='$spesifikasi', `harga`='$harga' WHERE `id`='$id'")) {
        alert("Printer berhasil diedit!", BASE_VIEWS."printer/edit.php?id=".$id);
    } else {
        alert("Something went wrong!", BASE_VIEWS."printer/edit.php?id=".$id);
    }
    
} else {
    alert("Forbidden action!", BASE_VIEWS."printer/index.php");
}


?>