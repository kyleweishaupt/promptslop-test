<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <h1>Blog Posts</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="/posts/create">Create New Post</a>
        <form method="post" action="/logout" style="display:inline;">
            <button type="submit">Logout</button>
        </form>
    <?php else: ?>
         <a href="/login">Login</a>
         <a href="/register">Register</a>
     <?php endif; ?>
     <?php foreach ($posts as $post): ?>
        <div class="post">
            <h2><a href="/posts/<?php echo $post['id']; ?>"><?php echo htmlspecialchars($post['title']); ?></a></h2>
            <p><?php echo htmlspecialchars(substr($post['content'], 0, 100)); ?>...</p>
            <small><?php echo $post['created_at']; ?></small>
            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id']): ?>
                <a href="/posts/<?php echo $post['id']; ?>/edit">Edit</a>
                <form method="post" action="/posts/<?php echo $post['id']; ?>/delete" style="display:inline;">
                    <button type="submit">Delete</button>
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</body>
</html>