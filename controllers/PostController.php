<?php
/*
    controllers/PostController.php
*/

    class PostController extends PostModel {
        public function index() {
            require_once('models/posts.php');
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
            require('views/post/index.php');
        }

        public function all() {
            require_once('models/posts.php');
            $option = array(
                'order_by' => 'id desc'
            );
            $posts = get_a_record('posts', $option);
            if (empty($posts)) show_404();
            $title = 'All Posts - Quán Chị Kòi';
            require('views/post/all.php');
        }
    }