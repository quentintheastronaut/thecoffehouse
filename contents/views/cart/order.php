<!--
    Order
-->
<?php require('contents/views/shared/header.php'); ?>
<div role="main" class="main shop">
    <div class="container">
        <hr class="tall">
        <div class="row">
            <div class="col-md-12">
                <h2 class="shorter"><strong>Payment and order procedures</strong></h2>
                <?php if (!isset($user_nav)) echo '<p>Feedback of customer<a href="admin.php">Please click here to login.</a></p>';
                else echo '<p>Your response<strong><a href="index.php&controller=feedback">Please click here to send response.</a></strong></p>' ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <strong>Review & Checkout</strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse in">
                            <div class="panel-body">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                    <tr>
                                        <th class="product-thumbnail">
                                            &nbsp;
                                        </th>
                                        <th class="product-name">
                                            Product
                                        </th>
                                        <th class="product-price">
                                            Price
                                        </th>
                                        <th class="product-quantity">
                                            Quantity
                                        </th>
                                        <th class="product-subtotal">
                                            Total
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($cart as $product_id => $product) { ?>
                                        <tr class="cart_table_item">
                                        <td class="product-thumbnail">
                                            <a href="product/<?php echo $product['id'] . '-' . slug($product['name']); ?>">
                                                <img width="100" height="100" alt="<?=$product['name']?>" class="img-responsive" src="<?php echo 'public/upload/products/' . $product['image'] ?>">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="product/<?php echo $product['id'] . '-' . slug($product['name']); ?>"><?php echo $product['name'] ?></a>
                                        </td>
                                        <td class="product-price">
                                                <span class="amount"><?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ</span>
                                        </td>
                                        <td class="product-quantity">
                                            <?php echo $product['number']; ?>
                                        </td>
                                        <td class="product-subtotal">
                                                <span class="amount"><?php echo number_format($product['price'] * $product['number'], 0, ',', '.') ?> VNĐ</span>
                                        </td>
                                        </tr><?php } ?>
                                    </tbody>
                                </table>
                                <hr class="tall">
                                <h4>Total cart statistics</h4>
                                <table cellspacing="0" class="cart-totals">
                                    <tbody>
                                    <tr class="cart-subtotal">
                                        <th>
                                            <strong>Total items</strong>
                                        </th>
                                        <td>
                                            <strong><span class="amount"><?php echo cart_number(); ?></span></strong>
                                        </td>
                                    </tr>
                                    <tr class="total">
                                        <th>
                                            <strong>Total price</strong>
                                        </th>
                                        <td>
                                            <strong><span class="amount"><?php echo number_format(cart_total(), 0, ',', '.'); ?> VNĐ</span></strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr class="tall">
                                <h3 style="text-align: center;"><strong>Note ordering and payment</strong></h3>
                                <p><strong>We support customers at the store and free shipping within a radius of 5km</strong></p>
                                <form action="" id="" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="remember-box checkbox">
                                                <label>
                                                    <input type="checkbox" checked="checked">Ship COD
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <strong>Delivery address</strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse in">
                            <div class="panel-body">
                                <form action="index.php?controller=cart&amp;action=checkout" role="form" id="" method="post">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Nation</label>
                                                <select class="form-control">
                                                    <option value="">Viet Nam</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (!isset($user_nav)) : ?>
                                        <input type="hidden" name="user_id" value="0">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><strong>Name</strong></label>
                                                    <input type="text" name="name" class="form-control" required="required" placeholder="Input your name...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label><strong>Province/ City</strong></label>
                                                    <input type="text" name="province" required="required" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label><strong>Phone Number</strong></label>
                                                    <input type="text" name="phone" required="required" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><strong>Address</strong> </label>
                                                    <input type="text" name="address" required="required" class="form-control" placeholder="Input your address...">
                                                </div>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <input type="hidden" name="user_id" value="<?= $user_nav ?>">
                                        <h3>The information below is automatically added from your account. You can edit if the information is wrong!</h3>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><strong>Họ & Tên</strong></label>
                                                    <input type="text" name="name" value="<?= $user_login['user_name'] ?>" class="form-control" required="required" placeholder="Input your name...">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label><strong>Province/ City</strong></label>
                                                    <input type="text" name="province" required="required" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label><strong>Phone Number</strong></label>
                                                    <input type="text" value="<?= $user_login['user_phone'] ?>" name="phone" required="required" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label><strong>Địa chỉ </strong></label>
                                                    <input type="text" name="address" value="<?= $user_login['user_address'] ?>" required="required" class="form-control" placeholder="Input address...">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label><strong>Message - order note:</strong></label>
                                                <textarea name="message" id="message" class="form-control" cols="30" rows="10" placeholder="Write somethong about your offer"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input name="cart_total" type="hidden" value="<?php echo cart_total() ? cart_total() : '0'; ?>" />
                                    <div class="form-group" style="text-align: center">
                                        <button type="submit" class="btn btn-primary"><i class="fa  fa-check-square-o"></i> Order</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h4>Total</h4>
                <table cellspacing="0" class="cart-totals">
                    <tbody>
                    <tr class="cart-subtotal">
                        <th>
                            <strong>Total item</strong>
                        </th>
                        <td>
                            <strong><span class="amount"><?php echo cart_number(); ?></span></strong>
                        </td>
                    </tr>
                    <tr class="total">
                        <th>
                            <strong>Total price</strong>
                        </th>
                        <td>
                            <strong><span class="amount"><?php echo number_format(cart_total(), 0, ',', '.'); ?> VNĐ</span></strong>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require('contents/views/shared/footer.php');
