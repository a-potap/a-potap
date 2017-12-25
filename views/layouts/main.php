<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">
        <div class="row header">
            <div class="col-sm-4 hidden-xs">
                <a href="/"> <img src="/img/logo.jpg"></a>
            </div>
            <div class="col-sm-8 menu">
                <div class="row">
                    <?
                    NavBar::begin([
                        'brandLabel' => 'POTAPOV',
                        //'brandUrl' => Yii::$app->homeUrl,
                        'options' => [
                            'class' => 'navbar-inverse',
                        ],
                        'innerContainerOptions' => [
                            'class' => 'container-fluid',
                        ]

                    ]);
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-right'],
                        'items' => [
                            ['label' => 'Photo', 'url' => ['/photo'], 'active' => Yii::$app->controller->id == 'photo'],
                            ['label' => 'Video', 'url' => ['/site/video']],
                            ['label' => 'Music', 'url' => ['/site/music']],
                            ['label' => 'Blog', 'url' => ['/blog'], 'active' => Yii::$app->controller->id == 'blog'],
                            ['label' => 'Resume', 'url' => ['/site/resume']],
                        ],
                    ]);
                    NavBar::end();
                    ?>

                </div>
            </div>
        </div>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-right">&copy; a-potap <?= date('Y') ?></p>
   </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
