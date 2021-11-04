<!--
    Add
-->
<?php
require_once('admin/models/feedbacks.php');
require_once('admin/models/order.php');
if (!empty($_POST)) {
    feedback_order_add();
}
if (isset($_GET['order_id'])) $order_id = intval($_GET['order_id']);
else $order_id = 0;
$order = get_a_record('orders', $order_id);
$order_detail = order_detail($order_id);
if (isset($user_nav)) {
    $user_action = get_a_record('users', $user_nav);
}
$status = array(
    0 => 'Confirmed',
    1 => 'Processed',
    2 => 'Processing',
    3 => 'Canceled'
);
$title = 'Send your feedback to the store';
$nav_feedback = 'class="active open"';
require('admin/views/feedback/add.php');
