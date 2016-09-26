<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
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

<div class="event-form">

   <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'nama_event')->textInput(['maxlength' => true, 'placeholder' => 'Nama Event']) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'tgl_event')->widget(\kartik\datecontrol\DateControl::classname(), [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Tgl Event',
                        'autoclose' => true
                    ]
                ],
            ]); ?>
        </div>
        <div class="col-md-4">
             <?= $form->field($model, 'waktu_event')->widget(\kartik\datecontrol\DateControl::className(), [
                'type' => \kartik\datecontrol\DateControl::FORMAT_TIME,
                'saveFormat' => 'php:H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Waktu Event',
                        'autoclose' => true
                    ]
                ]
            ]); ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'jumlah_tiket')->textInput(['placeholder' => 'Jumlah Tiket']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'alamat')->textInput(['placeholder' => 'Alamat']) ?>
        </div>
    </div>
   
    <?= $form->field($model, 'file') -> fileInput(); ?>
    

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
