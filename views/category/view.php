<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

?>
<!--<section id="advertisement">
    <div class="container">
        <img src="/images/shop/advertisement.jpg" alt="" />
    </div>
</section>-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <ul class="catalog category-products">
                        <!--/вывод виджета меню-->
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
                    </ul>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"><?=$category->name?></h2>
                    <?php if(!empty($products)): ?>
                        <?php $i = 0; foreach ($products as $product): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?= Html::img("@web/images/products/{$product->img}", ['alt' =>$product->name])?>
                                    <h2>$<?= $product->price?></h2>
                                    <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id])?>"><?= $product->name?></a></p>
                                    <a href="#" data-id="<?= $product->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                </div>
                        <?php if($product->new): ?>
                            <?= Html::img("@web/images/home/new.png", ['alt' =>'Новинка', 'class' => 'new'])?>
                        <?php endif?>
                        <?php if($product->sale): ?>
                            <?= Html::img("@web/images/home/sale.png", ['alt' =>'Распродажа', 'class' => 'new'])?>
                        <?php endif?>
                            </div>
                        </div>
                    </div>
                        <?php $i++ ?>
                        <?php if($i % 3 == 0): ?>
                            <div class="clearfix"></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                        <?php
                        echo \yii\widgets\LinkPager::widget([
                            'pagination' => $pages,
                        ]);
                        ?>
                        <?php else : ?>
                        <h2>Здесь товаров пока нет</h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(".catalog").dcAccordion();
</script>