<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
    session_start();
    require_once(__DIR__ . '/config.php');
    // フォームに入力した値を保存
    $form = new Post();
    $form->send_post();
    // トークンを生成
    $token = new Token();
    $token = $token->token_create();
    // データ出力
    $posts_data = Datebase::dbselect();
?>
    <?php include __DIR__ . '/header.php' ;?>
        <main class="bg-sky-100 p-10  sm:flex sm:justify-center">
            <div class="text-neutral-950">
                <h2 class="mb-5 text-2xl font-bold text-neutral-500">New Post</h2>
                <form class="mb-10" action="" method="post">
                    <dl>
                        <dd class="flex flex-wrap mt-2">
                            <label class="mr-1" for="name">Name : </label>
                                <input class="bg-white" type="text" name="name" value="<?php echo $form->h($_POST['name']) ;?>">
                        </dd>
                        <?php if(isset($form->error['name'])) : ?>
                            <p class="text-rose-600"><?php echo $form->error['name']; ?></p>
                        <?php endif; ?>
                        <dd class="flex flex-wrap mt-2">
                            <label class="mr-1" for="text">Post Text : </label>
                                <textarea class="bg-white" name="text" cols="50" rows="5"><?php echo $form->h($_POST['text']); ?></textarea>
                        </dd>
                        <?php if(isset($form->error['text'])) : ?>
                            <p class="text-rose-600"><?php echo $form->error['text']; ?></p>
                            <?php endif; ?>
                        <dd class="mt-5 text-center">
                            <input class="w-30 sm:w-48 bg-sky-400 text-blue-50 text-lg py-2 px-5" type="submit" name="post" value="Post">
                        </dd>
                    </dl>
                    <input type="hidden" name="token" value="<?php echo $form->h($token);?>">
                </form>
                <h2 class="text-2xl font-bold text-neutral-500">
                    Post List
                </h2>
                <?php foreach($posts_data as $post_data) : ?>
                    <p class="text-neutral-800 my-1">
                        No : <?php echo $post_data['id'] ;?>
                    </p>
                    <p class="text-neutral-800 my-1">
                        Name : <?php echo $post_data['name'] ;?>
                    </p>
                    <p class="text-neutral-800 my-1">
                        Post : <?php echo $post_data['text'] ;?>
                    </p>
                    <hr class="mt-2">
                <?php endforeach; ?>
            </div>
        </main>
    </div>
</body>
</html>