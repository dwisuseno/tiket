<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\tiket\models\Likert */

$this->title = 'Create Likert';
$this->params['breadcrumbs'][] = ['label' => 'Likert', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="likert-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
