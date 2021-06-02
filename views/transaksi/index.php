<?php

$title = "LSP | Transaksi";
require_once "../head.php";

if(logged_in(BASE_VIEWS."pages/index.php") == "admin") {
	$transaksi_list = query("SELECT * FROM `transaksi`");
} else {
	$user_id = $_SESSION['user']['id'];
	$transaksi_list = query("SELECT * FROM `transaksi` WHERE `user_id`='$user_id'");
}



?>


<div class="font-bold text-2xl p-2">
	Daftar transaksi
</div>

<table class="w-full table-fixed bg-blue-100">
	<thead>
		<tr>
			<th class="p-2 w-1/12 border border-solid border-blue-500">ID</th>
			<th class="p-2 w-3/12 border border-solid border-blue-500">Nama Pembeli</th>
			<th class="p-2 w-3/12 border border-solid border-blue-500">Nama Printer</th>
			<th class="p-2 w-1/12 border border-solid border-blue-500">Jumlah</th>
			<th class="p-2 w-1/12 border border-solid border-blue-500">Total Harga</th>
			<th class="p-2 w-1/12 border border-solid border-blue-500">Status Konfirmasi</th>
			<th class="p-2 w-2/12 border border-solid border-blue-500">Action</th>

		</tr>
	</thead>
	<tbody>
	<?php if ($transaksi_list): ?>
		<?php foreach($transaksi_list as $transaksi): ?>
			<?php
			$user_id = $transaksi['user_id'];
			$printer_id = $transaksi['printer_id'];

			$user = query("SELECT `username` FROM `users` WHERE `id`='$user_id'", TRUE);
			$printer = query("SELECT `nama` FROM `printer` WHERE `id`='$printer_id'", TRUE);
			?>
			
			<tr class="">
				<td class="p-2 border border-solid border-blue-500"><?= $transaksi['id'] ?></td>
				<td class="p-2 border border-solid border-blue-500 font-semibold"><?= $user['username'] ?></td>
				<td class="p-2 border border-solid border-blue-500 font-semibold"><?= $printer['nama'] ?></td>
				<td class="p-2 border border-solid border-blue-500"><?= $transaksi['jumlah'] ?></td>
				<td class="p-2 border border-solid border-blue-500"><?= $transaksi['total_harga'] ?></td>
				<td class="p-2 border border-solid border-blue-500 text-center">
				<?php 
					if($transaksi['status'] == 1) {
						echo "Sudah dikonfirmasi" ;
					} else {
						echo "Belum dikonfirmasi";
					}
				?>
				</td>
				<td class="p-2 border border-solid border-blue-500">
					<div class="flex flex-row justify-center space-x-4">
						<?php if(logged_in() == "admin"): ?>
							<a href="<?= BASE_VIEWS ?>transaksi/detail.php?id=<?= $transaksi['id']?>" class="bg-blue-500 hover:bg-blue-600 focus:bg-blue-700">
								<div class="p-2 font-semibold text-white rounded-sm">
									DETAIL
								</div>
							</a>
							<?php if($transaksi['status'] == 1): ?>
							<form action="<?= BASE_SYSTEM ?>transaksi/delete.php" method="POST">
								<input type="hidden" name="transaksi_id" value="<?= $transaksi['id'] ?>">
								<button type="submit" name="transaksi_delete" class="p-2 bg-red-500 hover:bg-red-600 focus:bg-red-700 font-bold text-white rounded-sm outline-none">HAPUS</button>
							</form>
							<?php else: ?>
							<form action="<?= BASE_SYSTEM ?>transaksi/konfirmasi.php" method="POST">
								<input type="hidden" name="transaksi_id" value="<?= $transaksi['id'] ?>">
								<button type="submit" name="transaksi_konfirmasi" class="p-2 bg-green-500 hover:bg-green-600 focus:bg-green-700 font-bold text-white rounded-sm outline-none">KONFIRMASI</button>
							</form>
							<?php endif; ?>
						<?php elseif(logged_in() == "customer" && $transaksi['status'] != 1): ?>
							<form action="<?= BASE_SYSTEM ?>transaksi/delete.php" class="flex flex-row justify-between space-x-2" method="POST">
								<input type="hidden" name="transaksi_id" value="<?= $transaksi['id'] ?>">
								<button type="submit" name="transaksi_delete" class="p-2 bg-yellow-500 hover:bg-yellow-600 focus:bg-yellow-700 font-bold text-white outline-none">CANCEL</button>
							</form>
						<?php else: ?>
							<a href="<?= BASE_VIEWS ?>transaksi/detail.php?id=<?= $transaksi['id']?>" class="bg-blue-500 hover:bg-blue-600 focus:bg-blue-700">
								<div class="p-2 font-semibold text-white rounded-sm">
									DETAIL
								</div>
							</a>
							<form action="<?= BASE_SYSTEM ?>transaksi/delete.php" method="POST">
								<input type="hidden" name="transaksi_id" value="<?= $transaksi['id'] ?>">
								<button type="submit" name="transaksi_delete" class="p-2 bg-red-500 hover:bg-red-600 focus:bg-red-700 font-bold text-white rounded-sm outline-none">HAPUS</button>
							</form>
						<?php endif; ?>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
	<?php else: ?>
		<div class="p-2 text-xl font-semibold text-center bg-yellow-300">Tidak ada transaksi</div>
	<?php endif; ?>
	</tbody>
</table>

<?php require_once "../footer.php"; ?>