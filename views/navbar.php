<?php

$title = "LSP | Login";
require_once "../head.php";

?>


<div class="flex flex-row items-center justify-between px-4 py-2 bg-blue-500">
    <div class="flex flex-row items-center space-x-4">
        <a href="<?= BASE_VIEWS ?>pages/index.php">
            <div class="p-2 font-semibold text-2xl text-white">LSP</div>
        </a>
        <div class="flex flex-row items-center space-x-1">
            <a href="<?= BASE_VIEWS ?>pages/index.php">
                <div class="p-2 text-white hover:bg-blue-400">PRINTER</div>
            </a>
            <?php if(logged_in()): ?>
            <a href="<?= BASE_VIEWS ?>transaksi/index.php">
                <div class="p-2 text-white hover:bg-blue-400">TRANSAKSI</div>
            </a>
            <?php endif; ?>
        </div>
        
        
            
    </div>
    <div class="flex flex-row space-x-2">

        
        <?php if(logged_in()): ?>
        <div class="flex flex-row space-x-4">
            <div class="font-semibold text-2xl text-white">
                Halo, <?= $_SESSION['user']['username']?>!
            </div>
            <a href="<?= BASE_SYSTEM ?>auth/logout.php" class="bg-white hover:bg-gray-100 focus:bg-gray-200">
                <div class="p-2 font-semibold text-blue-500 rounded">
                    LOGOUT
                </div>
            </a>
        </div>
        
        <?php else: ?>
        <div class="flex flex-row space-x-4">
            <a href="<?= BASE_VIEWS ?>auth/login.php" class="ring-white bg-blue-500 hover:bg-gray-100 focus:bg-gray-200">
                <div class="p-2 ring ring-white hover:ring-gray-100 focus:ring-200 font-bold text-white hover:text-blue-500 rounded">
                    LOGIN
                </div>
            </a>
            <a href="<?= BASE_VIEWS ?>auth/register.php" class="bg-white hover:bg-gray-100 focus:bg-gray-200 rounded">
                <div class="p-2 font-bold text-blue-500">
                    REGISTER
                </div>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>
    

</div>



<?php require_once "../footer.php"; ?>