<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\tiket\models\Tiket */

$this->title = 'Create Tiket';
$this->params['breadcrumbs'][] = ['label' => 'Tiket', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiket-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>