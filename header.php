<?php 

// CURRENT_URL
$current_url = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="./js/main.js" defer></script>
    <title>YK BBS</title>
</head>
<body>
<div class="container mx-auto">
<header class="bg-sky-400 text-center py-5">
    <div class="text-3xl font-bold text-blue-50">
        <?php if(strpos($current_url, "index.php")) : ?>
            <h1>YK BBS</h1>
        <?php endif ;?>
        <?php if(strpos($current_url, 'complate.php')) : ?>
            <h1> Send Completed !</h1>
        <?php endif;?>
    </div>
</header>