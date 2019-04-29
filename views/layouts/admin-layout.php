<?php

/* @var $this \yii\web\View */
/* @var $content string */
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAppAsset;
use yii\helpers\Url;
use app\models\Category;

AdminAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="super_container">

    <!-- Header -->

    <header class="header">
        <div class="header_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_content d-flex flex-row align-items-center justify-content-start">
                            <div class="logo"><a href="/">Sublime.</a></div>
                            <nav class="main_nav">
                                <ul>
                                    <li class="active">
                                        <a href="/">Home</a>
                                    </li>
                                    <? if (!Yii::$app->user->isGuest){?>
                                    <li>
                                        <a href="/admin">Orders</a>
                                    </li>
                                    <li>
                                        <a href="/admin/category">Category</a>
                                    </li>
                                    <li>
                                        <a href="/logout">Logout</a>
                                    </li>
                                    <? }?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="container">
        <?=$content ?>

    </div>

</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>