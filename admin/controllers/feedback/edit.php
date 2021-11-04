<!--
    Edit
-->
<?php
permission_user();
permission_moderator();
require_once('admin/models/feedbacks.php');
require_once('admin/models/order.php');
if (!empty($_POST)) {
    feedback_update();
}
if (isset($_GET['feedback_id'])) $feedback_id = intval($_GET['feedback_id']);
else $feedback_id = 0;
$title = ($feedback_id == 0) ? '' : 'Edit customer`s feedback';
$nav_feedback = 'class="active open"';
$feedback = get_a_record('feedbacks', $feedback_id);
if ($feedback['order_id'] <> 0) {
    $order_detail = order_detail($feedback['order_id']);
    $order = get_a_record('orders', $feedback['order_id']);
}
if ($feedback['product_id'] <> 0) {
    $product = get_a_record('products', $feedback['product_id']);
}
$status = array(
    0 => 'Confirmed',
    1 => 'Processed',
    2 => 'Processing',
    3 => 'Canceled'
);
require('admin/views/feedback/edit.php');