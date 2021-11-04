<!--
    Product
-->
<?php
permission_user();
require_once('admin/models/feedbacks.php');
$title = 'Customer feedback about the product';
$nav_feedback = 'class="active open"';
require('admin/views/feedback/product.php');
