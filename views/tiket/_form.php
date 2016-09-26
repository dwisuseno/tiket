<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tiket */
/* @var $form yii\widgets\ActiveForm */

?>


        <div class="tiket-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->errorSummary($model); ?>

            <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
            <div class="row">
                <div class="col-md-4">
            <?= $form->field($model, 'event_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Event::find()->orderBy('id')->asArray()->all(), 'id', 'nama_event'),
                'options' => ['placeholder' => 'Choose Event'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
            <?= $form->field($model, 'jenis_id')->widget(\kartik\widgets\Select2::classname(), [
               'data' => \yii\helpers\ArrayHelper::map(\app\models\JenisTiket::find()->orderBy('id')->asArray()->all(), 'id', 'kode_jenis'),
               'options' => ['placeholder' => 'Choose Jenis tiket'],
               'pluginOptions' => [
                   'allowClear' => true
               ],
           ]); ?>
                </div>
            </div>
            <?php // $form->field($model, 'kode_tiket')->textInput(['maxlength' => true, 'placeholder' => 'Kode Tiket']) ?>

            <?php echo $form->field($model, 'status')->dropDownList([ '0', '1', '2'], ['prompt' => '']) ?>

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
    

