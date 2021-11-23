<script type="text/javascript">
  document.title = 'Thông tin đơn hàng';
</script> 
<div class="row">
  <div class="col-lg-6">
    <section class="panel">
      <header class="panel-heading">
        <h1>Thông tin hoá đơn</h1>
        <a href="/admin/sales">Trở về</a>
      </header>
      <div class="panel-body">
        <dl class="dl-horizontal">
          <dt>Mã giao dịch</dt><dd><?= $params['recordModel']->getId() ?></dd>
          <dt>Tên khách hàng</dt><dd><?= $params['recordModel']->getUserName() ?></dd>
          <dt>Tên sản phẩm</dt><dd><?= $params['recordModel']->getProductName() ?></dd>
          <dt>Kích thước</dt><dd><?= $params['recordModel']->getSize() ?></dd>
          <dt>Số lượng</dt><dd><?= $params['recordModel']->getQuantity() ?></dd>
          <dt>Giá</dt><dd><?= $params['recordModel']->getTotalPrice() ?></dd>
        </dl>
      </div>
    </section>
  </div>
</div>