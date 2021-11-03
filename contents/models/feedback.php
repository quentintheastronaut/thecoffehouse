<!--
Feedback
-->
<?php
function feedback_add()
{
    $feedback_add = array(
        'id' => intval($_POST['feedback_id']),
        'user_id' => intval($_POST['user_id']),
        'product_id' => intval($_POST['product_id']),
        'create_at' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'subject' => escape($_POST['message']),
        'starts' => intval($_POST['starts'])
    );
    save('feedbacks', $feedback_add);
    echo "<div style='padding-top: 200' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done!</strong> Thư phản hồi của bạn đã được gửi đến hệ thống của quán Chị Kòi. Cảm ơn bạn đã gửi lại phải hồi về quán. <br><br>Hãy đến <a href='index.php'>Trang chủ</a></div></div>";
    require('contents/views/feedback/result.php');
    exit;
}