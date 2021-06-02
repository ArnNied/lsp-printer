<?php

$title = "LSP | Katalog";
require_once "../head.php";

$printer_list = query("SELECT * FROM `printer`");
?>


<div class="font-bold text-2xl p-2">
	Katalog
</div>

<?php if(logged_in() == "admin"): ?>
<div class="flex flex-row">
	<a href="<?= BASE_VIEWS ?>printer/add.php" class="bg-blue-500 hover:bg-blue-600 focus:bg-blue-700">
		<div class="p-2 font-semibold text-lg text-white rounded-sm">
			+ Printer
		</div>
	</a>
</div>
<?php endif; ?>


<table class="w-full table-fixed bg-blue-100">
	<thead>
		<tr>
			<th class="p-2 w-1/12 border border-solid border-blue-500">ID</th>
			<th class="p-2 w-4/12 border border-solid border-blue-500">Nama Printer</th>
			<th class="p-2 w-3/12 border border-solid border-blue-500">Spesifikasi</th>
			<th class="p-2 w-2/12 border border-solid border-blue-500">Harga</th>
			<th class="p-2 w-2/12 border border-solid border-blue-500">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php if($printer_list): ?>
		<?php foreach($printer_list as $printer): ?>
			<tr class="">
				<td class="p-2 border border-solid border-blue-500 text-center"><?= $printer['id'] ?></td>
				<td class="p-2 border border-solid border-blue-500 font-semibold"><?= $printer['nama'] ?></td>
				<td class="p-2 border border-solid border-blue-500"><?= $printer['spesifikasi'] ?></td>
				<td class="p-2 border border-solid border-blue-500"><?= $printer['harga'] ?></td>
				<td class="p-2 border border-solid border-blue-500 space-x-4">
					<div class="flex flex-row justify-center space-x-4">
						<?php if(logged_in() == "admin"): ?>
							<a href="<?= BASE_VIEWS ?>printer/edit.php?id=<?= $printer['id'] ?>" class="bg-blue-500 hover:bg-blue-600 focus:bg-blue-700">
								<div class="p-2 font-semibold text-white rounded-sm">
									EDIT
								</div>
							</a>
							<form action="<?= BASE_SYSTEM ?>printer/delete.php" method="POST">
								<input type="hidden" name="printer_id" value="<?= $printer['id'] ?>">
								<button type="submit" name="printer_delete" class="p-2 bg-red-500 hover:bg-red-600 focus:bg-red-700 font-semibold text-white rounded-sm outline-none">DELETE</button>
							</form>
						<?php elseif(logged_in() == "customer"): ?>
						<form action="<?= BASE_SYSTEM ?>transaksi/add.php" class="flex flex-row justify-between space-x-2" method="POST">
							<input type="hidden" name="printer_id" value="<?= $printer['id'] ?>">
							<input type="number" name="jumlah_beli" placeholder="Jumlah" class="w-24 p-2 border border-solid border-blue-500 rounded-sm outline-none">
							<button type="submit" name="transaksi_add" class="p-2 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 font-semibold text-white outline-none">BELI</button>
						</form>
						<?php else: ?>
						-
						<?php endif; ?>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
	<?php else: ?>
		<div class="p-2 text-xl font-semibold text-center bg-yellow-300">Tidak ada printer</div>
	<?php endif; ?>
	</tbody>
</table>

<?php require_once "../footer.php"; ?>