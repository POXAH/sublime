<? $this -> title = $product['name'];

use yii\widgets\ActiveForm; ?>
<!-- Home -->

    <div class="home home-notmain">
        <div class="home_container">
            <div class="home_background" style="background-image:url(/images/categories.jpg)"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title"><?=$product['name']?><span>.</span></div>
                                <div class="home_text"><p><?=$product['description']?></p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?
//echo '<pre>';
//var_dump($_SESSION);
//echo '</pre>';
?>
    <!-- Product Details -->

    <div class="product_details">
        <div class="container">
            <div class="row details_row">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        <? $imgDetailProduct = explode(',', $product['img_detail']);?>
                        <div class="details_image_large"><img src="/images/<?=$imgDetailProduct['0']?>" alt="">
                            <? if ($product['flag']){?>
                                <div class="product_extra <?=$product['flag']? 'product_'.strtolower($product['flag']) : ''?>"><a href="categories.html"><?=$product['flag']?></a></div>
                            <? } ?>
                        </div>
                        <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                            <?foreach ($imgDetailProduct as $id => $img){?>
                                <div class="details_image_thumbnail <?=($id == 0)? 'active' : '';?>" data-image="/images/<?=$img?>"><img src="/images/<?=$img?>" alt=""></div>
                            <? } ?>
                        </div>
                    </div>
                </div>

                <!-- Product Content -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name"><?=$product['name']?></div>
                        <? if($product['flag']=='Sale'){ ?>
                            <div class="details_discount">$<?=$product['price']?></div>
                            <div class="details_price">$<?=$product['price']-$product['price']*$product['discount']/100;?></div>
                        <? } else {?>
                            <div class="details_price">$<?=$product['price'];?></div>
                        <? } ?>

                        <!-- In Stock -->
                        <div class="details_text">
                            <p><?=$product['description'];?></p>
                        </div>

                        <!-- Product Quantity -->
                        <div class="product_quantity_container">
                            <div class="product_quantity clearfix">
                                <span>Qty</span>
                                <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                <div class="quantity_buttons">
                                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div data-name="<?=$product['link_name']?>" class="button cart_button" onclick="addCart(event)"><a href="#">Add to cart</a></div>
                        </div>

                        <!-- Share -->
                        <div class="details_share">
                            <span>Share:</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row description_row">
                <div class="col">
                    <div class="description_title_container">
                        <div class="description_title">Description</div>
                    </div>
                    <div class="description_text">
                        <p><?=$product['description'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="products_title">Related Products</div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid">

                        <!-- Product -->
                        <?foreach ($products as $productDetail){?>
                            <!-- Product -->
                            <div class="product">
                                <div class="product_image"><a href="/product/<?=$productDetail['link_name']?>"><img src="/images/<?=$productDetail['img']?>" alt="<?=$productDetail['name']?>"></a></div>
                                <? if($productDetail['flag']){?>
                                    <div class="product_extra product_<?=strtolower($productDetail['flag'])?>"><a style="color: white;"><?=$productDetail['flag']?></a></div>
                                <? } ?>
                                <div class="product_content">
                                    <div class="product_title"><a href="/product/<?=$productDetail['link_name']?>"><?=$productDetail['name']?></a></div>
                                    <div class="product_price">$<?=$productDetail['price']?></div>
                                </div>
                            </div>
                        <? } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_border"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="newsletter_content text-center">
                        <div class="newsletter_title">Subscribe to our newsletter</div>
                        <div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros</p></div>
                        <div class="newsletter_form_container">
                            <? $form = ActiveForm::begin([
                                'id' => 'newsletter_form',
                                'class' => 'newsletter_form'
                            ]) ?>
                            <?=$form
                                ->field($mailer, 'email')
                                ->label('')
                                ->textInput([
                                    'type'=> 'email',
                                    'class' => 'newsletter_input',
                                    'id' => 'checkout_email',
                                ]);?>
                            <button class="newsletter_button trans_200"><span>Subscribe</span></button>
                            <? ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
