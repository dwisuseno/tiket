<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\tiket\models\Likert */

$this->title = 'Save As New Likert: '. ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Likert', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Save As New';
?>
<div class="likert-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
