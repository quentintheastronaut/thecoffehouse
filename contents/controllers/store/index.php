<!--
    contents/controllers/store/index.php
-->
<?php
if (isset($_GET['id'])) {
    $store_id = intval($_GET['id']);
} else show_404();
$category = get_a_record('categories', $store_id);
if (!$category) show_404();
$categories = get_all('categories', array(
    'select' => 'id, category_name',
    'order_by' => 'category_position ASC'
));

if (isset($_GET['page'])) $page = intval($_GET['page']);
else $page = 1;

$page = ($page > 0) ? $page : 1;
$limit = 9;
$offset = ($page - 1) * $limit;

$options = array(
    'where' => 'category_id=' . $store_id,
    'limit' => $limit,
    'offset' => $offset,
    'order_by' => 'id DESC'
);

$url = 'shop/' . $store_id . '-' . $category['slug'];
$total_rows = get_total('products', $options);
$total = ceil($total_rows / $limit);

$products = get_all('products', $options);
$pagination = pagination($url, $page, $total);

if ($category['id'] != 0) {
    $breadCrumb = $category['category_name'];
}
$title = $category['category_name'] . ' - Quán Chị Kòi';
//load view
require('contents/views/shop/index.php');
