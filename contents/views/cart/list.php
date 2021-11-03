<!--
    List
-->
<div class="featured-box featured-box-secundary featured-box-cart">
    <div class="box-content">
        <form method="post" action="index.php?controller=cart" role="form">
            <table cellspacing="0" class="shop_table cart">
                <thead>
                <tr>
                    <th class="product-remove">
                        &nbsp;
                    </th>
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
                        Total price
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cart as $product_id => $product) { ?>
                    <tr class="cart_table_item">
                        <td class="product-remove">
                            <a title="Remove this item" class="remove" href="cart/delete/<?php echo $product['id']; ?>">
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                        <td class="product-thumbnail">
                            <a href="product/<?php echo $product['id'] . '-' . slug($product['name']); ?>">
                                <img width="100" height="100" alt="<?= $product['name'] ?>" class="img-responsive" src="<?php echo 'public/upload/products/' . $product['image'] ?>">
                            </a>
                        </td>
                        <td class="product-name">
                            <a href="product/<?php echo $product['id'] . '-' . slug($product['name']); ?>"><?php echo $product['name'] ?></a>
                        </td>
                        <td class="product-price">
                            <?php if ($product["typeid"] == 3) : ?>
                                <span class="amount"><?php echo $product ? number_format(($product['price']) - ($product['price']) * ($product['percent_off']) / 100, 0, ',', '.') : 0; ?> VNĐ</span>
                            <?php else : ?>
                                <span class="amount"><?php echo number_format($product['price'], 0, ',', '.'); ?> VNĐ</span>
                            <?php endif ?>
                        </td>
                        <td class="product-quantity">
                            <div class="quantity">
                                <input type="number" class="input-text qty text" title="Nhập Để Đổi Số Lượng" value="<?php echo $product['number']; ?>" name="number[<?php echo $product['id']; ?>]" min="1" step="1" max="100">
                            </div>
                        </td>
                        <td class="product-subtotal">
                                <span class="amount"><?php echo number_format($product['price'] * $product['number'], 0, ',', '.') ?> VNĐ</span>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="actions" colspan="6">
                        <div class="actions-continue">
                            <input type="submit" value="Update cart" class="btn btn-default" title='Update cart if you changed the quantity of items'>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<div class="featured-box featured-box-secondary featured-box-cart">
    <form method="post" action="index.php?controller=cart&action=destroy" role="form">
        <div class="box-content"><span style="float: left;"><a href="index.php" class="btn btn-success"><i class="fa fa-hand-o-left"></i>Return and continue shopping</a></span><span style="float: right;"><strong>If you want to clear cart, please click</strong> <button onclick="return confirm('Are you sure to delete?')" type="submit" value="Delete cart" class="btn btn-danger" title='Delete the cart if you want to clear'><b><i class="fa fa-refresh"></i> Delete cart</b>
                </button></span></div>
    </form>
</div>