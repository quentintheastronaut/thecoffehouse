<!--
    contents/controllers/post/all.php
-->
<?php
require_once('contents/models/posts.php');
$option = array(
    'order_by' => 'id desc'
);
$posts = get_a_record('posts', $option);
if (empty($posts)) show_404();
$title = 'All Posts - Quán Chị Kòi';
//load view
require('contents/views/post/all.php');
