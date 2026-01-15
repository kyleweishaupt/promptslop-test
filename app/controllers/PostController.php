<?php
class PostController {
    public function index() {
        $post = new Post();
        $posts = $post->all();
        include 'app/views/posts/index.php';
    }

    public function show($id) {
        $post = new Post();
        $postData = $post->find($id);
        include 'app/views/posts/show.php';
    }

    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = new Post();
            $data = [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'user_id' => $_SESSION['user_id']
            ];
            try {
                $post->create($data);
                header('Location: /posts');
                exit;
            } catch (Exception $e) {
                echo "Error creating post: " . $e->getMessage();
                exit;
            }
        }
        include 'app/views/posts/create.php';
    }

    public function edit($id) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        $post = new Post();
        $postData = $post->find($id);
        if (!$postData || $postData['user_id'] != $_SESSION['user_id']) {
            header('Location: /posts');
            exit;
        }
        include 'app/views/posts/edit.php';
    }

    public function update($id) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        $post = new Post();
        $postData = $post->find($id);
        if (!$postData || $postData['user_id'] != $_SESSION['user_id']) {
            header('Location: /posts');
            exit;
        }
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ];
        $post->update($id, $data);
        header('Location: /posts');
    }

    public function delete($id) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }
        $post = new Post();
        $postData = $post->find($id);
        if ($postData && $postData['user_id'] == $_SESSION['user_id']) {
            $post->delete($id);
        }
        header('Location: /posts');
    }
}