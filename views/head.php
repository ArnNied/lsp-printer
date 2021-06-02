<?php

require_once "../../system/conn.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>static/css/tailwind.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>static/css/style.css">

    <title><?= $title ?></title>
</head>
<body class="bg-blue-700">

<?php require_once "../navbar.php"; ?>

<div class="px-12">
    <div class="flex flex-col bg-white p-4 space-y-4">