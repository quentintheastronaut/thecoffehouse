<?php
/*
    controllers/product.php
*/

    class ProductController extends ProductModel {
        public function index() {
            if (isset($_GET['page'])) $page = intval($_GET['page']);
            else $page = 1;

            $page = ($page > 0) ? $page : 1;
            $limit = 12;
            $offset = ($page - 1) * $limit;

            $options = array(
                'order_by' => 'id desc',
                'limit' => $limit,
                'offset' => $offset,
            );

            $url = 'index.php?controller=product&action=all';
            $total_rows = get_total('products', $options);
            $total = ceil($total_rows / $limit);
            $pagination = pagination($url, $page, $total);

            $products_all = get_all('products', $options);
            require('views/product/all.php');
        }

        public function all() {
            require_once('models/products.php');
            if (isset($_GET['id'])) {
                $product_id = intval($_GET['id']);
            } else show_404();
            $product = get_a_record('products', $product_id);

            if (!$product) {
                show_404();
            } else   updateCountView($product_id);
            $title = $product['product_name'] . ' - Our store';
            $image_product = PATH_URL . 'public/upload/products/' . $product['img'];
            $url_product = 'product/' . $product['id'] . '-' . $product['slug'];
            $categories = get_all('categories', array(
                'select' => 'id, category_name',
                'order_by' => 'id ASC'
            ));
            $subcategories = get_a_record('subcategory', $product['sub_category_id']);
            if ($product['sub_category_id'] != 0) {
                $breadCrumb = $subcategories['subcategory_name'];
            }
            $comment_option = array(
                'where' => 'product_id=' . $product['id'],
                'limit' => 10,
                'offset' => 0,
                'order_by' => 'id desc'
            );
            $comment_total_option = array(
                'where' => 'product_id=' . $product['id']
            );
            $comments = get_all('comments', $comment_option);
            $comments_total = get_total('comments', $comment_total_option);
            require('views/product/index.php');
        }
    }