<?php

$title = "LSP | Edit Printer";
require_once "../head.php";

if(logged_in() != "admin") {
    header("Location: ".BASE_VIEWS."printer/index.php");
}

$id = $_GET['id'];
$printer = query("SELECT * FROM `printer` WHERE `id`='$id'", TRUE);

?>

<?php if($printer): ?>
<div class="p-8 bg-white rounded space-y-4">
    <div class="font-semibold text-xl text-center">
        Edit Printer
    </div>
    <form action="<?= BASE_SYSTEM ?>printer/edit.php" method="POST" class="flex flex-col space-y-4">
        <input type="hidden" name="printer_id" value=<?= $id ?>>
        <div class="flex flex-col">
            <label for="nama">Nama Printer</label>
            <input type="text" name="nama" value="<?= $printer['nama']?>" placeholder="Nama Printer" id="nama" class="p-1 border-b border-solid border-blue-500 outline-none" autocomplete="off">
        </div>
        <div class="flex flex-col">
            <label for="spesifikasi">Spesifikasi</label>
            <input type="text" name="spesifikasi" value="<?= $printer['spesifikasi'] ?>" placeholder="Spesifikasi Printer" id="spesifikasi" class="p-1 border-b border-solid border-blue-500 outline-none">
        </div>
        <div class="flex flex-col">
            <label for="harga">Harga</label>
            <input type="number" name="harga" value="<?= $printer['harga'] ?>" placeholder="Harga Printer" id="harga" class="p-1 border-b border-solid border-blue-500 outline-none">
        </div>
        <div class="flex flex-col">
            <button type="submit" name="printer_edit" class="p-2 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 font-semibold text-white">Edit Printer</button>        
        </div>
    </form>
</div>

<?php else: ?>
<div class="p-12 font-semibod text-4xl text-center text-gray-500">
    NOT FOUND
</div>
<?php endif; ?>


<?php require_once "../footer.php"; ?>