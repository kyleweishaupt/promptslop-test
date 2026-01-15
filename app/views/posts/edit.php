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
        <textarea name="content" required><?php echo htmlspecialchars($postData['content']); ?></textarea>
        <button type="submit">Update</button>
    </form>
    <a href="/posts">Back to Posts</a>
</body>
</html>