<!--
    Other
-->
<?php
permission_user();
require_once('admin/models/feedbacks.php');
$title = 'Customer feedback';
$nav_feedback = 'class="active open"';
require('admin/views/feedback/other.php');
