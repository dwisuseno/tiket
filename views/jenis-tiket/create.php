<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisTiket */

$this->title = 'Create Jenis Tiket';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Tiket', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-tiket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
