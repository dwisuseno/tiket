<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\tiket\models\LikertSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-likert-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'kelas_a')->textInput(['placeholder' => 'Kelas A']) ?>

    <?= $form->field($model, 'kelas_b')->textInput(['placeholder' => 'Kelas B']) ?>

    <?= $form->field($model, 'kelas_c')->textInput(['placeholder' => 'Kelas C']) ?>

    <?= $form->field($model, 'kelas_d')->textInput(['placeholder' => 'Kelas D']) ?>

    <?php /* echo $form->field($model, 'kelas_e')->textInput(['placeholder' => 'Kelas E']) */ ?>

    <?php /* echo $form->field($model, 'total')->textInput(['placeholder' => 'Total']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
