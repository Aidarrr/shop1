<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\assets\ltAppAsset;

AppAsset::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>


</head><!--/head-->
<body>
<?php $this->beginBody() ?>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +7 912 555-35-35</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> aidarik.sultan007@mail.ru</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left clearfix">
                        <a href="<?= \yii\helpers\Url::home()?>"><?= Html::img('@web/images/home/logo.png', ['alt' => 'E-shopper'])?></a>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            <?php if(!Yii::$app->user->isGuest): ?>
                            <li><a href="<?= \yii\helpers\Url::to(['/site/logout']) ?>"><i class="fa fa-user"></i> <?= Yii::$app->user->identity['username']?> (Выход)</a></li>
                            <?php endif; ?>
                            <li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i> Корзина</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/cart/view']) ?>"><i class="fa fa-crosshairs"></i> Оформить заказ</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/admin']) ?>"><i class="fa fa-lock"></i> Авторизация</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?= \yii\helpers\Url::home()?>" class="active">Главная страница</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form method="get" action="<?= \yii\helpers\Url::to(['category/search'])?>">
                            <input type="text" placeholder="Поиск" name="q">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<?= $content ?>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>Иж</span>Авто</h2>
                        <p>Интернет-магазин по продаже автомобильных запчастей (2022)</p>
                    </div>
                </div>
                <div class="col-sm-7">

                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="/images/home/map.png" alt="" />
                        <p>ул. Ленина, г. Ижевск, Удмуртская республика, Россия (2022)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type='text/javascript'>
        function  showCart(cart){
            $('#cart .modal-body').html(cart);
            $('#cart').modal();
        }

        function getCart(){
            $.ajax({
                url: '/cart/show',
                type: 'GET',
                success: function(res){
                    if(!res) alert('Ошибка!');
                    showCart(res);
                },
                error: function(){
                    alert('Error!');
                }
            });
            return false;
        }

        function clearCart(){
            $.ajax({
                url: '/cart/clear',
                type: 'GET',
                success: function(res){
                    if(!res) alert('Ошибка!');
                    showCart(res);
                },
                error: function(){
                    alert('Error!');
                }
            });
        }

    </script>
</footer><!--/Footer-->

<?php
    \yii\bootstrap4\Modal::begin([
            'title' => '<h2>Корзина</h2>',
            'id' => 'cart',
            'size' => 'modal-lg',
            'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
            <a href=" ' . \yii\helpers\Url::to(['cart/view']) . '" class="btn btn-success">Оформить заказ</a>
            <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>'
    ]);
    \yii\bootstrap4\Modal::end();
?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>