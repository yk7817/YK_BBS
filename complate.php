<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
    require_once(__DIR__ . '/config.php');
    session_start();
    $form = new Post();
    $name = $_SESSION['name'];
    $text = $_SESSION['text'];
    $form->delete_session();
?>
<?php include __DIR__ . '/header.php' ;?>
<main class="bg-sky-100 p-10  sm:flex sm:justify-center">
    <div class="">
        <p class="text-neutral-800 my-1">Name : <?php echo $form->h($name); ?></p>
        <p class="text-neutral-800 my-1">Post : <?php echo $form->h($text);?></p>
        <form action="" method="post">
            <input class="w-30 sm:w-48 bg-sky-400 text-blue-50 text-lg py-2 px-5 mt-5 cursor-pointer" type="submit" name="back" value="Back">
        </form>
    </div>
</main>
</body>
</html>