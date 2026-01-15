<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($postData['title']); ?></title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($postData['title']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($postData['content'])); ?></p>
    <small><?php echo $postData['created_at']; ?></small>
    <a href="/posts">Back to Posts</a>
</body>
</html>