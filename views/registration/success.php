<?
$this->title = 'Success order №'.$order['id'];
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
                                    <li>Success order</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="cart_info">
    <div class="container">
<!--        --><?// echo '<pre>';
//        var_dump($order);
//        echo '</pre>';?>
        <h2>Your order №<?=$order['id']?> issued.</h2>
        <button class="button newsletter_button"><a href="/"><span>Home</span></a></button>
    </div>
</div>