<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Mini Social Media</title>
</head>
<body>
    <?php foreach ($posts as $post): ?>
        <article>
            <a href="<?= route('user.show', $post['author_id']) ?>">
                <header>
                    <h3><?= $post['author'] ?></h3>
                    <div>
                        <?= $post['username'] ?> · <?= $post['time'] ?>
                    </div>
                </header>
            </a>
            <a href="<?= route('post.show', $post['id']) ?>">
                <p><?= $post['content'] ?></p>
            </a>
            <div>
                <a href="<?= route('post.show', $post['id']) ?>#likes"><?= $post['likes'] ?> likes</a>
                <a href="<?= route('post.show', $post['id']) ?>#comments"><?= $post['comments'] ?> comments</a>
            </div>
        </article>
        <hr/>
    <?php endforeach; ?>
</body>
</html>
