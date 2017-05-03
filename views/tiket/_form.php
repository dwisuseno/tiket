<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tiket */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'JenisTiket', 
        'relID' => 'jenis-tiket', 
        'value' => \yii\helpers\Json::encode($model->jenisTikets),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="tiket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'event_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Event::find()->orderBy('id')->asArray()->all(), 'id', 'nama_event'),
        'options' => ['placeholder' => 'Choose Event'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php // $form->field($model, 'user_id')->textInput(['placeholder' => 'User']) ?>

    <?= $form->field($model, 'kode_pembayaran')->textInput(['maxlength' => true, 'placeholder' => 'Kode Pembayaran']) ?>

    <?php // $form->field($model, 'kode_tiket')->textInput(['maxlength' => true, 'placeholder' => 'Kode Tiket']) ?>

    <?= $form->field($model, 'status')->dropDownList([ '0'=>'Belum Bayar', '1'=>'Sudah Bayar', '2'=>'Telah Digunakan', ], ['prompt' => '']) ?>

    <?php
    // $forms = [
    //     [
    //         'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('JenisTiket'),
    //         'content' => $this->render('_formJenisTiket', [
    //             'row' => \yii\helpers\ArrayHelper::toArray($model->jenisTikets),
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
    </div>

    <?php ActiveForm::end(); ?>

</div>
