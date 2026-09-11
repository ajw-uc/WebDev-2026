<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Mini Social Media</title>
</head>
<body>
    <form action="{{ route('post.store') }}" method="POST">
        <div>
            <textarea name="content" placeholder="What's on your mind?" rows="5"></textarea>
        </div>
        <div>
            <input type="file" name="image">
        </div>
        <div>
            <button type="submit">Post</button>
        </div>
    </form>
</body>
</html>
