<!--
    Index
-->
<?php
require('contents/views/shared/header.php'); ?>
<div role="main" class="main shop">
    <div class="container">
        <hr class="tall">
        <div class="row">
            <div class="col-md-12">
                <div class="row featured-boxes">
                    <div class="col-md-12">
                        <?php require('contents/views/cart/list.php'); ?>
                    </div>
                </div>
                <div class="row featured-boxes cart">
                    <div class="col-md-12">
                        <div class="featured-box featured-box-secundary default">
                            <div class="box-content">
                                <h4>Thống kê giỏ hàng</h4>
                                <table cellspacing="0" class="cart-totals">
                                    <tbody>
                                    <tr class="cart-subtotal">
                                        <th>
                                            <strong>Total quantity of items in cart</strong>
                                        </th>
                                        <td>
                                            <strong><span class="amount"><?php echo cart_number(); ?></span></strong>
                                        </td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>
                                            Shipping
                                        </th>
                                        <td>
                                            Free Shipping 5KM<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
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
                <div class="row featured-boxes">
                    <div class="col-md-12">
                        <div class="actions-continue">
                            <form action="cart/order/checkout" method="post">
                                <input type="submit" value="Continue payment→" name="proceed" class="btn btn-lg btn-primary"></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('contents/views/shared/footer.php'); ?>