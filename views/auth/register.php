<?php

$title = "LSP | Register";
require_once "../head.php";

if(logged_in()) {
    header("Location: ".BASE_VIEWS."pages/index.php");
}
?>

<div class="centered p-8 bg-white rounded space-y-4">
    <div class="font-semibold text-xl text-center">
        REGISTER
    </div>
    <form action="<?= BASE_SYSTEM ?>auth/register.php" method="POST" class="flex flex-col space-y-4">
        <div class="flex flex-col">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username" id="username" class="p-1 border-b border-solid border-blue-500 outline-none" autocomplete="off">
        </div>
        <div class="flex flex-col">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" id="password" class="p-1 border-b border-solid border-blue-500 outline-none">
        </div>
        <div class="flex flex-col">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" class="p-1 border-b border-solid border-blue-500 outline-none">
        </div>
        <div class="flex flex-col">
            <button type="submit" name="user_register" class="p-2 bg-blue-500 hover:bg-blue-600 focus:bg-blue-700 font-semibold text-white">REGISTER</button>   
        </div>
</form>
</div>


<?php require_once "../footer.php"; ?>