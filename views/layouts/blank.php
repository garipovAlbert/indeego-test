<?php

use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= $this->title ? Html::encode($this->title) : Yii::$app->name ?></title>
        <?php $this->head() ?>
    </head>

    <body>
        <?php $this->beginBody() ?>


        <div class="wrap">

            <?php
            NavBar::begin([
                'brandLabel' => 'TEST',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            $menuItems = [];

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>


            <?= $content ?>

        </div>


        <footer class="footer">
            <div class="container">
                <p class="pull-left">© 2016 TEST</p>
                <p class="pull-right"></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>

</html>
<?php $this->endPage() ?>