<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Login */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="login-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username']) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true, 'placeholder' => 'Password']) ?>

    <?php $form->field($model, 'authKey')->textInput(['maxlength' => true, 'placeholder' => 'AuthKey']) ?>

    <?php $form->field($model, 'accessToken')->textInput(['maxlength' => true, 'placeholder' => 'AccessToken']) ?>

    <?= $form->field($model, 'role')->dropDownList([ 'admin'=>'admin', 'user'=>'user'], ['prompt' => '']) ?>

    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
