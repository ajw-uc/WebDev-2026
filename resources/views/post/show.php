<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Detail - Mini Social Media</title>
</head>
<body>
    <h1>Post detail</h1>
    <h3><?= $post['author_name'] ?>'s post</h3>
    <p>Content: <?= $post['content'] ?></p>
    <hr/>
    <h4>Comments</h4>
    <div>
        <?php foreach ($post['comments'] as $comment): ?>
            <div>
                <h5><?= $comment['author_name'] ?></h5>
                <p><?= $comment['content'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
