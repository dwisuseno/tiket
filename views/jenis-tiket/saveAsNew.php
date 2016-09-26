<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisTiket */

$this->title = 'Save As New Jenis Tiket: '. ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Tiket', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Save As New';
?>
<div class="jenis-tiket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
