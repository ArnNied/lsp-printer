<?php

$title = "LSP | Detail Transaksi";
require_once "../head.php";

if(!logged_in()) {
    header("Location: ".BASE_VIEWS."printer/index.php");
}

$transaksi_id = $_GET['id'];
$transaksi = query("SELECT * FROM `transaksi` WHERE `id`='$transaksi_id'", TRUE);

if(logged_in() != "admin" and ($transaksi['user_id'] != $_SESSION['user']['id'] and logged_in() != "admin")) {
    alert("Forbidden action!", BASE_VIEWS."pages/index.php");
}

$user_id = $transaksi['user_id'];
$user = query("SELECT `username` FROM `users` WHERE `id`='$user_id'", TRUE);
$printer_id = $transaksi['printer_id'];
$printer = query("SELECT `nama` FROM `printer` WHERE `id`='$printer_id'", TRUE);

?>

<div class="flex flex-col space-y-4">
    <div class="font-bold text-2xl p-2">
        Detail Transaksi
    </div>
    <div class="flex flex-row space-x-4">
        <div class="flex flex-col flex-1 space-y-2">
            <div class="flex flex-col">
                <p class="font-semibold">Nama Pembeli:</p>
                <p><?= $user['username'] ?></p>
            </div>
            <div class="flex flex-col">
                <p class="font-semibold">Nama Printer:</p>
                <p><?= $printer['nama'] ?></p>
            </div>
            <div class="flex flex-col">
                <p class="font-semibold">Jumlah Beli:</p>
                <p><?= $transaksi['jumlah'] ?></p>
            </div>
            <div class="flex flex-col">
                <p class="font-semibold">Total harga:</p>
                <p><?= $transaksi['total_harga']?></p>
            </div>
            <div class="flex flex-col">
                <p class="font-semibold">Status:</p>
                <p>
                <?php
                if($transaksi['status'] == 1) {
                    echo "Sudah Dikonfirmasi";
                } else {
                    echo "Belum dikonfirmasi";
                }
                ?>
                </p>
            </div>
        </div>
        <div class="flex flex-col flex-1">
            <form action="<?= BASE_SYSTEM ?>transaksi/delete.php" method="POST" class="w-full">
                <input type="hidden" name="transaksi_id" value="<?= $transaksi['id'] ?>">
                <button type="submit" name="transaksi_delete" class="p-2 bg-red-500 hover:bg-red-600 focus:bg-red-700 font-bold text-white rounded-sm outline-none w-full">HAPUS</button>
            </form>
        </div>
    </div>
</div>



<?php require_once "../footer.php" ?>