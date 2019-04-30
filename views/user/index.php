<?php

use yii\helpers\Html;


$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
$user = Yii::$app->user->identity;
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
                                    <li>Purchase history.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="cart_info">
        <div><b>Last Name: </b><?=$user['last_name']?></div>
        <div><b>Name: </b><?=$user['name']?></div>
        <div><b>Address: </b><?=$user['address']?></div>
        <div><b>Phone: </b><?=$user['phone']?></div>
        <div><b>Email: </b><?=$user['email']?></div>

<!--    --><?//
//    echo '<pre>';
//    var_dump($orders_info);
//    echo '</pre>';
//
//    echo '<pre>';
//    var_dump($orders_id);
//    echo '</pre>';
//    ?>
    <?
    if ($orders_id){?>
        <h1><?= Html::encode($this->title) ?></h1>
        <?foreach ($orders_id['id'] as $id => $order) {

        ?>
        <div style="margin: 10px">
            <div><b>Номер заказ №<?=$order?></b></div>
                    <? foreach ($orders_info as $info) {
                        if ($info['id_order'] == $order) {
                            ?>
                            <div> - "<?=$info['name']?>" в количестве <?=$info['quantity']?> шт., стоимость за единицу $<?=$info['price']?>. Общая цена $<?=$info['sum']?></div>
                        <?} ?>
                    <?} ?>
                    <div>Доставка $<?=$delivery[$orders_id['delivery_id'][$id]-1]['price']?></div>
        </div>
        <? }?>
    <?} else {?>
    <div class="container" id="cart">
        <h1>You have no orders yet.</h1>
        <div class="row row_cart_buttons">
            <div class="col">
                <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                    <div class="button continue_shopping_button newsletter_button"><a href="/category">Continue shopping</a></div>
                </div>
            </div>
        </div>
    </div>
        <?}?>
</div>
</div>
