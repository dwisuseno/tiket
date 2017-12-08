<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Tiket */
$this->title = 'Update Tiket: ' . ' ' . $model->kode_pembayaran;
$this->params['breadcrumbs'][] = ['label' => 'Tiket', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tiket-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

