<script type="text/javascript">
  document.title = 'Xoá sản phẩm';
</script> 
<div class="row">
  <div class="col-lg-6">
    <section class="panel">
      <header class="panel-heading">
        <h1>Xóa hoá đơn</h1>
        <a href="/admin/sales">Trở về</a>
      </header>
      <div class="panel-body">
        <?php $form = app\core\Form\Form::begin('', "post") ?>
          <input type="hidden" name="id" id="id" value="<?= $params['recordModel']->getId() ?>" />
          <dl class="dl-horizontal">
            <dt>Mã giao dịch</dt><dd><?= $params['recordModel']->getId() ?></dd>
            <dt>Tên khách hàng</dt><dd><?= $params['recordModel']->getUserName() ?></dd>
            <dt>Tên sản phẩm</dt><dd><?= $params['recordModel']->getProductName() ?></dd>
            <dt>Kích thước</dt><dd><?= $params['recordModel']->getSize() ?></dd>
            <dt>Số lượng</dt><dd><?= $params['recordModel']->getQuantity() ?></dd>
            <dt>Giá</dt><dd><?= $params['recordModel']->getTotalPrice() ?></dd>
          </dl>
          <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Xóa mục</button>
        <?php app\core\form\Form::end() ?>
      </div>
    </section>
  </div>
</div>