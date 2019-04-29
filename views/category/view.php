<!-- Home -->
<?
$this->title = $category['name'];

use yii\widgets\ActiveForm; ?>
<div class="home home-notmain">
    <div class="home_container">
        <div class="home_background" style="background-image:url(/images/categories.jpg)"></div>
        <div class="home_content_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="home_title"><?=$category['name']?><span>.</span></div>
                            <div class="home_text"><p><?=$category['description']?></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Products -->

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col">

                <!-- Product Sorting -->
                <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                    <div class="results">Showing <span><?=$total?></span> results</div>
                    <div class="sorting_container ml-md-auto">
                        <div class="sorting">
                            <ul class="item_sorting">
                                <li>
                                    <span class="sorting_text">Sort by</span>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    <ul>
                                        <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
                                        <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                        <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "title" }'><span>Name</span></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <div class="product_grid">

                    <?foreach ($products as $product){?>
                        <!-- Product -->
                        <div class="product">
                            <div class="product_image"><a href="/product/<?=$product['link_name']?>"><img src="/images/<?=$product['img']?>" alt="<?=$product['name']?>"></a></div>
                            <? if($product['flag']){?>
                                <div class="product_extra product_<?=strtolower($product['flag'])?>"><a href="categories.html"><?=$product['flag']?></a></div>
                            <? } ?>
                            <div class="product_content">
                                <div class="product_title"><a href="/product/<?=$product['link_name']?>"><?=$product['name']?></a></div>
                                <div class="product_price">$<?=$product['price']-$product['price']*$product['discount']/100?></div>
                            </div>
                        </div>
                    <? } ?>

                </div>
                <div class="product_pagination">
                    <ul>
                        <?= \yii\widgets\LinkPager::widget([
                            'pagination' => $pages,
                        ]);
                        ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Icon Boxes -->

<div class="icon_boxes">
    <div class="container">
        <div class="row icon_box_row">

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="/images/icon_1.svg" alt=""></div>
                    <div class="icon_box_title">Free Shipping Worldwide</div>
                    <div class="icon_box_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                    </div>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="/images/icon_2.svg" alt=""></div>
                    <div class="icon_box_title">Free Returns</div>
                    <div class="icon_box_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                    </div>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="/images/icon_3.svg" alt=""></div>
                    <div class="icon_box_title">24h Fast Support</div>
                    <div class="icon_box_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?
//echo '<pre>';
//var_dump($products);
//echo '</pre>';
?>

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