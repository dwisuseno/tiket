<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tiket */
/* @var $form yii\widgets\ActiveForm */

$this->title = "User Setting";

?>

<div class="tiket-form">

    <?php $form = ActiveForm::begin([
                //'layout' => 'horizontal',
                'method' => 'post',
                'action' => ['tiket/updateuser'],

            ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Kode Pembayaran']) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'password')->textInput(['maxlength' => true, 'placeholder' => 'Kode Tiket']) ?>
        </div>
    </div>
    

    <div class="form-group">
    <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
