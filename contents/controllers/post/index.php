<!--
    contents/controllers/post/index.php
-->
<?php
require_once('contents/models/posts.php');
if (isset($_GET['id'])) {
    $post_id = intval($_GET['id']);
} else show_404();
$post = get_a_record('posts', $post_id);
$user = get_a_record('users', $post['post_author']);
if (!$post || $post['post_status'] <> 'published') {
    show_404();
} else   updateCountView($post_id);
$image_post = $post['post_avatar'];
$title = $post['post_title'] . ' - Quán Chị Kòi';
$url_product = 'post/' . $post['id'] . '-' . $post['post_slug'];
$image_product = PATH_URL . 'public/upload/ckeditorimages/' . $post['post_avatar'];
//load view
require('contents/views/post/index.php');
