<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>
<div id="fb-root"></div>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'TIKET ONLINE',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
    ]);
    if(Yii::$app->user->identity == null){
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'activateParents' => true,
            'items' => [
                ['label' => 'Beranda', 'url' => ['/site']],
                ['label' => 'Event', 'url' => ['/tiket/lihatevent']],
                [
                    'label' => 'About',
                    'items' => [
                        '<li>'. Html::a('Profil','index.php?r=site/profil') .'</li>',
                        '<li>'. Html::a('Pemesanan Layanan','index.php?r=site/layanan') .'</li>',
                    ],
                ],
                //['label' => 'Tentang', 'url' => ['site/about']],
                Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ' - ' . Yii::$app->user->identity->role . ')',
                        ['class' => 'btn btn-link']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    } else {
      if(Yii::$app->user->identity->role == 'admin'){
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            //'activateParents' => true,
            'items' => [
                ['label' => 'Beranda', 'url' => ['/site']],
                [
                    'label' => 'Event',
                    'items' => [
                        '<li>'. Html::a('Event  Detail','index.php?r=event/index') .'</li>',
                        '<li>'. Html::a('Event','index.php?r=tiket/lihatevent') .'</li>',
                    ],
                ],
                [
                    'label' => 'Tiket',
                    'items' => [
                        '<li>'. Html::a('Tiket Pemesanan','index.php?r=tiket/index') .'</li>',
                        '<li>'. Html::a('Tiket Anda','index.php?r=tiket/cektiket') .'</li>',
                    ],
                ],
                [
                    'label' => 'Setting User',
                    'items' => [
                        '<li>'. Html::a('User','index.php?r=login/index') .'</li>',
                        '<li>'. Html::a('User Setting','index.php?r=login/user') .'</li>',
                    ],
                ],
                [
                    'label' => 'About',
                    'items' => [
                        '<li>'. Html::a('Profil','index.php?r=site/profil') .'</li>',
                        '<li>'. Html::a('Pemesanan Layanan','index.php?r=site/layanan') .'</li>',
                    ],
                ],
                ['label' => 'Hasil Likert', 'url' => ['/likert']],
                Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                    
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
      } else if(Yii::$app->user->identity->role == 'user'){
          echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            //'activateParents' => true,
            'items' => [
                ['label' => 'Beranda', 'url' => ['/site']],
                ['label' => 'Event', 'url' => ['/tiket/lihatevent']],
                //['label' => 'Tentang', 'url' => ['site/about']],
                ['label' => 'Tiket Anda', 'url' => ['/tiket/cektiket']],
                ['label' => 'User Setting', 'url' => ['/login/user']],
                [
                    'label' => 'About',
                    'items' => [
                        '<li>'. Html::a('Profil','index.php?r=site/profil') .'</li>',
                        '<li>'. Html::a('Pemesanan Layanan','index.php?r=site/layanan') .'</li>',
                    ],
                ],
                Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                    
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
      }
    }
    NavBar::end();
    ?>

    <div class="container">
    
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Tiket Online </p>

        
    </div>
</footer>

<?php $this->endBody() ?>
<!-- <script src="//code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> 

<script>
  
  $(document).ready(function() {
      $('#test').DataTable({
      });
  } );

</script>
</body>
</html>
<?php $this->endPage() ?>
