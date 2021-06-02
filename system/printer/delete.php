<?php

require_once "../conn.php";

if (isset($_POST['printer_delete'], $_POST['printer_id']) 
    and logged_in() == "admin"
    and !empty($_POST['printer_id'])) {
    
    $printer_id = intval(clean_str($_POST['printer_id']));

    if(query("DELETE FROM `printer` WHERE `id`='$printer_id'")) {
        alert("Printer berhasil dihapus!", BASE_VIEWS."printer/index.php");
    } else {
        alert("Something went wrong!", BASE_VIEWS."printer/index.php");
    }
    
} else {
    alert("Forbidden action!", BASE_VIEWS."printer/index.php");
}


?>