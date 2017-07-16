<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\tiket\models\Likert */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="likert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'kelas_a')->textInput(['placeholder' => 'Kelas A']) ?>

    <?= $form->field($model, 'kelas_b')->textInput(['placeholder' => 'Kelas B']) ?>

    <?= $form->field($model, 'kelas_c')->textInput(['placeholder' => 'Kelas C']) ?>

    <?= $form->field($model, 'kelas_d')->textInput(['placeholder' => 'Kelas D']) ?>

    <?= $form->field($model, 'kelas_e')->textInput(['placeholder' => 'Kelas E']) ?>

    <?= $form->field($model, 'total')->textInput(['placeholder' => 'Total']) ?>

    <div class="form-group">
    <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php endif; ?>
    <?php if(Yii::$app->controller->action->id != 'create'): ?>
        <?= Html::submitButton('Save As New', ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
    <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
