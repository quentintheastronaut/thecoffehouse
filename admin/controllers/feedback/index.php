<!--
    Index
-->
<?php
permission_user();
require_once('admin/models/feedbacks.php');
$title = 'List of feedbacks';
$nav_feedback = 'class="active open"';
require('admin/views/feedback/index.php');