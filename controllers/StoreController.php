<?php
/*
    controllers/store.php
*/

    class StoreController extends StoreModel {
        public function index() {
            if (isset($_GET['id'])) {
                $store_id = intval($_GET['id']);
            } else show_404();
            $category = get_a_record('categories', $store_id);
            if (!$category) show_404();
            $categories = get_all('categories', array(
                'select' => 'id, category_name',
                'order_by' => 'category_position ASC'
            ));
        }
    }