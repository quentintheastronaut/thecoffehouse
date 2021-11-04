<!--
    Pending
-->
<?php
permission_user();
require_once('admin/models/feedbacks.php');
$title = 'Unapproved feedback';
$nav_feedback = 'class="active open"';
require('admin/views/feedback/pending.php');
