<? $this->title = 'Cart';?>

<!-- Home -->

    <div class="home home-small">
        <div class="home_container">
            <div class="home_background" style="background-image:url(/images/cart.jpg)"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="breadcrumbs">
                                    <ul>
                                        <li><a href="/">Home</a></li>
                                        <li>Shopping Cart</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Info -->

    <div class="cart_info">
    <?
        if ($session['cart']) {
    ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Column Titles -->
                    <div class="cart_info_columns clearfix">
                        <div class="cart_info_col cart_info_col_product">Product</div>
                        <div class="cart_info_col cart_info_col_price">Price</div>
                        <div class="cart_info_col cart_info_col_quantity">Quantity</div>
                        <div class="cart_info_col cart_info_col_total">Total</div>
                    </div>
                </div>
            </div>
            <div class="row cart_items_row">

                    <? foreach ($_SESSION['cart'] as $product) {
                        ?>
                        <div class="col-12">

                            <!-- Cart Item -->
                            <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                                <!-- Name -->
                                <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_item_image">
                                        <div><img src="/images/<?= $product['img'];?>" alt="<?= $product['name'];?>"></div>
                                    </div>
                                    <div class="cart_item_name_container">
                                        <div class="cart_item_name" ><a
                                                    href="/product/<?= $product['link_name'];?>"><?= $product['name'];?></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Price -->
                                <? if ($product['discount'] > 0) { ?>
                                    <div class="details_discount">$<?= $product['price'];?></div>
                                    <div class="cart_item_price">
                                        $<?= $product['price'] - $product['price'] * $product['discount'] / 100;?></div>
                                <? } else { ?>
                                    <div class="cart_item_price">$<?= $product['price'];?></div>
                                <? } ?>
                                <!-- Quantity -->
                                <div class="cart_item_quantity">
                                    <div class="product_quantity_container">
                                        <div class="product_quantity clearfix">
                                            <span>Qty</span>
                                            <input class="quantity_input" type="text" pattern="[0-9]*"
                                                   disabled="disabled"
                                                   value="<?= $product['productQuantity'];?>">
                                            <div class="quantity_buttons" data-product_id="<?=$product['id'];?>">
                                                <div class="quantity_inc quantity_control"><i class="fa fa-chevron-up"
                                                                                              aria-hidden="true"></i>
                                                </div>
                                                <div class="quantity_dec quantity_control"><i class="fa fa-chevron-down"
                                                                                              aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Total -->
                                <div class="cart_item_total">
                                    $<?= $product['productQuantity'] * ($product['price'] - $product['price'] * $product['discount'] / 100); ?></div>
                                <div class="delete" data-id="<?=$product['id']?>" style="text-align: center; cursor: pointer; vertical-align: middle; color: red">
                                    <span>&#10006;</span></div>
                            </div>

                        </div>
                    <?
                    }
                    ?>
            </div>
            <div class="row row_cart_buttons">
                <div class="col">
                    <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                        <div class="button continue_shopping_button newsletter_button"><a href="/category">Continue shopping</a></div>
                        <div class="cart_buttons_right ml-lg-auto">
                            <div class="button clear_cart_button newsletter_button" onclick="clearCart(event)"><a href="#">Clear cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row_extra">
                <div class="col-lg-4">

                    <!-- Delivery -->
                    <div class="delivery">
                        <div class="section_title">Shipping method</div>
                        <div class="section_subtitle">Select the one you want</div>
                        <div class="delivery_options">
                            <? foreach ($delivery as $method){?>
                            <label class="delivery_option clearfix"><?=$method['name']?>
                                <input type="radio" name="radio" <?if($method['id'] == $_SESSION['cart.deliveryId']){?>checked="checked" <?}?>class="delivery_radio" data-delivery_id="<?=$method['id']?>" data-delivery_price="<?=$method['price']?>">
                                <span class="checkmark"></span>
                                <span class="delivery_price"><?=($method['price'] == 0) ? 'Free' : '$'.$method['price']?></span>
                            </label>
                            <?}?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 offset-lg-2">
                    <div class="cart_total">
                        <div class="section_title">Cart total</div>
                        <div class="section_subtitle">Final info</div>
                        <div class="cart_total_container">
                            <ul>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Subtotal</div>
                                    <div class="cart_total_value ml-auto cart_total_subsum">$<?=$_SESSION['cart.totalSubSum']?></div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Shipping</div>
                                    <div class="cart_total_value ml-auto delivery_price">$<?=$_SESSION['cart.deliveryPrice']?></div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="cart_total_title">Total</div>
                                    <div class="cart_total_value ml-auto cart_total_sum">$<?=$_SESSION['cart.totalSum']?></div>
                                </li>
                            </ul>
                        </div>
                        <div class="button checkout_button newsletter_button"><a href="/order">Proceed to checkout</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? } else { ?>
    <div class="container" id="cart">
        <h1>Корзина пуста</h1>
        <div class="row row_cart_buttons">
            <div class="col">
                <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                    <div class="button continue_shopping_button newsletter_button"><a href="/category">Continue shopping</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?
}?>