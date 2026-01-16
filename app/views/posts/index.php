<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <h1>Blog Posts</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="btn-group" style="margin-bottom:10px;">
            <a class="btn" href="/posts/create">Create New Post</a>
            <form method="post" action="/logout" style="display:inline; margin-left:5px;">
                <button type="submit" class="btn">Logout</button>
            </form>
        </div>
    <?php else: ?>
        <div class="btn-group" style="margin-bottom:10px;">
            <a class="btn" href="/login">Login</a>
            <a class="btn" href="/register">Register</a>
        </div>
    <?php endif; ?>
    <?php foreach ($posts as $post): ?>
        <div class="post">
            <h2><a href="/posts/<?php echo $post['id']; ?>"><?php echo htmlspecialchars($post['title']); ?></a></h2>
            <p><?php echo htmlspecialchars(substr($post['content'], 0, 100)); ?>...</p>
            <small><?php echo $post['created_at']; ?></small>
            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id']): ?>
                <div class="btn-group" style="margin-top:5px;">
                    <a class="btn" href="/posts/<?php echo $post['id']; ?>/edit">Edit</a>
                    <form method="post" action="/posts/<?php echo $post['id']; ?>/delete" style="display:inline; margin-left:5px;">
                        <button type="submit" class="btn">Delete</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</body>
</html>