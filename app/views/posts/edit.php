<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <h1>Edit Post</h1>
<form method="post" action="/posts/<?php echo $postData['id']; ?>">
            <input type="text" name="title" value="<?php echo htmlspecialchars($postData['title']); ?>" required>
            <textarea name="content" required minlength="10"><?php echo htmlspecialchars($postData['content']); ?></textarea>
            <button type="submit" class="btn">Update</button>
        </form>
        <a href="/posts" class="btn">Back to Posts</a>
</body>
</html>