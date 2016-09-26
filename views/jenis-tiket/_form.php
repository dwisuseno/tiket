<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JenisTiket */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Tiket', 
        'relID' => 'tiket', 
        'value' => \yii\helpers\Json::encode($model->tikets),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="jenis-tiket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'kode_jenis')->textInput(['maxlength' => true, 'placeholder' => 'Kode Jenis']) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

    <?= $form->field($model, 'harga')->textInput(['placeholder' => 'Harga']) ?>

    <?php
    // $forms = [
    //     [
    //         'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Tiket'),
    //         'content' => $this->render('_formTiket', [
    //             'row' => \yii\helpers\ArrayHelper::toArray($model->tikets),
    //         ]),
    //     ],
    // ];
    // echo kartik\tabs\TabsX::widget([
    //     'items' => $forms,
    //     'position' => kartik\tabs\TabsX::POS_ABOVE,
    //     'encodeLabels' => false,
    //     'pluginOptions' => [
    //         'bordered' => true,
    //         'sideways' => true,
    //         'enableCache' => false,
    //     ],
    // ]);
    ?>
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
