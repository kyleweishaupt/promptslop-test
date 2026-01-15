<?php
session_start();

require_once 'config/database.php';
require_once 'app/Database.php';
require_once 'database/init.php';
require_once 'app/Router.php';
require_once 'app/models/User.php';
require_once 'app/models/Post.php';
require_once 'app/controllers/AuthController.php';
require_once 'app/controllers/PostController.php';