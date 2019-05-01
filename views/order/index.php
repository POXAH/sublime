<?
use yii\widgets\ActiveForm;
$this->title = 'Checkout';
?>

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
                                        <li><a href="/cart">Shopping Cart</a></li>
                                        <li>Checkout</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Checkout -->

    <div class="checkout">
        <div class="container">
            <div class="row">

                <!-- Billing Info -->
                <div class="col-lg-6">
                    <div class="billing checkout_section">
                        <div class="section_title">Billing Address</div>
                        <div class="section_subtitle">Enter your address info</div>
                        <div class="checkout_form_container">
                            <? $form=ActiveForm::begin([
                                    'options' => [
                                        'class' => 'checkout_form',
                                        'id' => 'checkout_form'
                                    ]
                            ]);
                            ?>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!-- Name -->
                                        <?=$form
                                            ->field($order, 'name')
                                            ->textInput([
                                                'class' => 'checkout_input',
                                                'id' => 'checkout_name',
                                                'value'=>(!Yii::$app->user->isGuest) ? Yii::$app->user->identity['name'] : ''
                                            ]);
                                        ?>
                                    </div>
                                    <div class="col-xl-6 last_name_col">
                                        <!-- Last Name -->
                                        <?=$form
                                            ->field($order, 'last_name')
                                            ->textInput([
                                                'class' => 'checkout_input',
                                                'id' => 'checkout_last_name',
                                                'value'=>(!Yii::$app->user->isGuest) ? Yii::$app->user->identity['last_name'] : ''
                                            ]);
                                        ?>
                                    </div>
                                </div>
                                <div>
                                    <!-- Address -->
                                    <?=$form
                                        ->field($order, 'address')
                                        ->textInput([
                                            'class' => 'checkout_input',
                                            'id' => 'checkout_address',
                                            'value'=>(!Yii::$app->user->isGuest) ? Yii::$app->user->identity['address'] : ''
                                        ]);
                                    ?>
                                </div>
                                <div>
                                    <!-- Phone no -->
                                    <?=$form
                                        ->field($order, 'phone')
                                        ->textInput([
                                            'class' => 'checkout_input',
                                            'id' => 'checkout_phone',
                                            'value'=>(!Yii::$app->user->isGuest) ? Yii::$app->user->identity['phone'] : ''
                                        ]);
                                    ?>
                                </div>
                                <div>
                                    <!-- Email -->
                                    <?=$form
                                        ->field($order, 'email')
                                        ->textInput([
                                                'type'=> 'email',
                                            'class' => 'checkout_input',
                                            'id' => 'checkout_email',
                                            'value'=>(!Yii::$app->user->isGuest) ? Yii::$app->user->identity['email'] : ''
                                        ]);
                                    ?>
                                </div>
                                <div class="checkout_extra">
                                    <div>
                                        <input type="checkbox" id="checkbox_terms" name="regular_checkbox_1" class="regular_checkbox" checked="checked" value="1">
                                        <label for="checkbox_terms"><img src="/images/check.png" alt=""></label>
                                        <span class="checkbox_title">Terms and conditions</span>
                                    </div>
                                    <? if (Yii::$app->user->isGuest){?>
                                    <div>
                                        <input type="checkbox" id="checkbox_account" name="regular_checkbox_2" class="regular_checkbox" value="1">
                                        <label for="checkbox_account"><img src="/images/check.png" alt=""></label>
                                        <span class="checkbox_title">Create an account</span>
                                    </div>
                                    <? } ?>
                                    <div>
                                        <input type="checkbox" id="checkbox_newsletter" name="regular_checkbox_3" class="regular_checkbox" value="1">
                                        <label for="checkbox_newsletter"><img src="/images/check.png" alt=""></label>
                                        <span class="checkbox_title">Subscribe to our newsletter</span>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <!-- Order Info -->

                <div class="col-lg-6">
                    <div class="order checkout_section">
                        <div class="section_title">Your order</div>
                        <div class="section_subtitle">Order details</div>

                        <!-- Order details -->
                        <div class="order_list_container">
                            <div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Product</div>
                                <div class="order_list_value ml-auto">Total</div>
                            </div>
                            <ul class="order_list">
                                <? foreach ($_SESSION['cart'] as $product) {?>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <img src="/images/<?= $product['img'];?>" width="80px" alt="<?= $product['name'];?>">
                                        <div class="order_list_title"><?= $product['name'];?></div>
                                        <div class="order_list_value ml-auto">$<?=$product['price'] - $product['price'] * $product['discount'] / 100;?></div>
                                    </li>

                                <? }?>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">Subtotal</div>
                                    <div class="order_list_value ml-auto">$<?=$_SESSION['cart.totalSubSum'];?></div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">Shipping</div>
                                    <div class="order_list_value ml-auto">$<?=$_SESSION['cart.deliveryPrice'];?></div>
                                </li>
                                <li class="d-flex flex-row align-items-center justify-content-start">
                                    <div class="order_list_title">Total</div>
                                    <div class="order_list_value ml-auto">$<?=$_SESSION['cart.totalSum'];?></div>
                                </li>
                            </ul>
                        </div>

                        <!-- Payment Options -->
                        <div class="payment">
                            <div class="payment_options">
                                <label class="payment_option clearfix">Paypal
                                    <input type="radio" name="radio" value="1">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="payment_option clearfix">Cach on delivery
                                    <input type="radio" name="radio" value="2">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="payment_option clearfix">Credit card
                                    <input type="radio" name="radio" value="3">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="payment_option clearfix">Direct bank transfer
                                    <input type="radio" checked="checked" name="radio" value="4">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
<!--                        --><?// echo '<pre>';
//                        var_dump($session['cart']);
//                        echo '</pre>';?>
                        <!-- Order Text -->
<!--                        <div class="order_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra temp or so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</div>-->
                        <button class="button order_button newsletter_button"><span>Place Order</span></button>
                        <? ActiveForm::end()?>
                    </div>
                </div>
            </div>
        </div>
    </div>
