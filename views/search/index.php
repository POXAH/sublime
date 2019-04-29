<!-- Home -->
<?
$this->title = 'Search';

use yii\widgets\ActiveForm; ?>

<div class="home-small"></div>

<!-- Products -->

<div class="products">
    <div class="container">
        <? if ($products) { ?>
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
<!---->
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
        <?} else { ?>

        <div class="results">Ничего не найдено по запросу "<?=$search?>"</div>

        <? }?>
    </div>
</div>