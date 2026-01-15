<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <h1>Create Post</h1>
    <form method="post" action="/posts">
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="content" placeholder="Content" required></textarea>
        <button type="submit">Create</button>
    </form>
    <a href="/posts">Back to Posts</a>
</body>
</html>