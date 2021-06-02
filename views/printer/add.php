<?php

$title = "LSP | Add Printer";
require_once "../head.php";

if(logged_in() != "admin") {
    header("Location: ".BASE_VIEWS."printer/index.php");
}

?>
<div class="p-8 bg-white rounded space-y-4">
    <div class="font-semibold text-xl text-center">
        Tambah Printer
    </div>
    <form action="<?= BASE_SYSTEM ?>printer/add.php" method="POST" class="flex flex-col space-y-4">
        <div class="flex flex-col">
            <label for="nama">Nama Printer</label>
            <input type="text" name="nama" placeholder="Nama Printer" id="nama" class="p-1 border-b border-solid border-blue-500 outline-none" autocomplete="off">
        </div>
        <div class="flex flex-col">
            <label for="spesifikasi">Spesifikasi</label>
            <input type="text" name="spesifikasi" placeholder="Spesifikasi Printer" id="spesifikasi" class="p-1 border-b border-solid border-blue-500 outline-none">
        </div>
        <div class="flex flex-col">
            <label for="harga">Harga</label>
            <input type="number" name="harga" placeholder="Harga Printer" id="harga" class="p-1 border-b border-solid border-blue-500 outline-none">
        </div>
        <div class="flex flex-col">
            <button type="submit" name="printer_add" class="p-2 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 font-semibold text-white">Tambah Printer</button>        
        </div>
    </form>
</div>


<?php require_once "../footer.php"; ?>