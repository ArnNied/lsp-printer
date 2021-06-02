<?php

require_once "../conn.php";

if (isset($_POST['printer_add'], $_POST['nama'], $_POST['spesifikasi'], $_POST['harga'])
    and logged_in() == "admin"
    and !empty($_POST['nama'])
    and !empty($_POST['spesifikasi'])
    and !empty($_POST['harga'])) {
    
    $nama = clean_str($_POST['nama']);
    $spesifikasi = clean_str($_POST['spesifikasi']);
    $harga = intval(clean_str($_POST['harga']));

    if($harga < 0) {
        alert("Harga printer harus diatas 0", BASE_VIEWS."printer/add.php");
    }
        
    if(query("INSERT INTO `printer` (`nama`, `spesifikasi`, `harga`) VALUES ('$nama', '$spesifikasi', '$harga')")) {
        alert("Printer berhasil ditambah!", BASE_VIEWS."printer/index.php");
    } else {
        alert("Something went wrong!", BASE_VIEWS."printer/add.php");
    }
    
} else {
    alert("Forbidden action!", BASE_VIEWS."printer/index.php");
}


?>