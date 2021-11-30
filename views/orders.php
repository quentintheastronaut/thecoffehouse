<div class="order-page">
    <div class="order-page__title">
        <h3>Đơn hàng của bạn</h3>
    </div>
    <div class="order-page__list">
        <div class="container">
            <div class="order-page__header">
                <div class="row">
                    <div class="col">
                        Số thứ tự
                    </div>
                    <div class="col">
                        Mã đơn hàng
                    </div>
                    <div class="col">
                        Tình trạng đơn hàng
                    </div>
                    <div class="col">
                        Ngày đặt hàng
                    </div>
                </div>
            </div>
            <?php
            foreach ($params['orders'] as $param) {
                echo '<div class="order-page__item">
                <a href="/order?id=' . $param->id . '">
                    <div class="row">
                        <div class="col">
                            1
                        </div>
                        <div class="col">
                            ' . $param->id . '
                        </div>
                        <div class="col">
                            ' . ($param->status == 'processing' ? 'Đang xử lý' : 'Hoàn thành') . '
                        </div>
                        <div class="col">
                            ' . $param->created_at . '
                        </div>
                    </div>
                </a>
            </div>';
            }
            ?>

        </div>
    </div>
</div>