<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

?>

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
                    <h2 class="title text-center">Поиск по запросу: <?= Html::encode($p)?></h2>
                    <?php if(!empty($products)): ?>
                        <?php $i = 0; foreach ($products as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?= Html::img("@web/images/products/{$product->img}", ['alt' =>$product->name])?>
                                            <h2><?= $product->price?>руб</h2>
                                            <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product->id])?>"><?= $product->name?></a></p>
                                            <a href="<?= \yii\helpers\Url::to(['cart/add','id' => $product->id])?>" data-id="<?= $product->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
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
                        <h2>Ничего не найдено...</h2>
                    <?php endif; ?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
<script>
    $(".catalog").dcAccordion();
</script>
