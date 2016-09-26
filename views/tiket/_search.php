<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TiketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-tiket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'event_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Event::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Event'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'jenis_id')->widget(\kartik\widgets\Select2::classname(), [ 
       'data' => \yii\helpers\ArrayHelper::map(\app\models\JenisTiket::find()->orderBy('id')->asArray()->all(), 'id', 'id'), 
       'options' => ['placeholder' => 'Choose Jenis tiket'], 
       'pluginOptions' => [ 
           'allowClear' => true 
       ], 
   ]); ?> 

    <?= $form->field($model, 'kode_tiket')->textInput(['maxlength' => true, 'placeholder' => 'Kode Tiket']) ?>

    <?= $form->field($model, 'status')->dropDownList([ '0', '1','2'], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
