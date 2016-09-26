<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\helpers\url;
/* @var $this yii\web\View */
/* @var $model app\models\Tiket */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tiket', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiket-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Tiket'.' '. Html::encode($this->title) ?></h2>
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-4">
            <?php 
                $gridColumn = [
                    ['attribute' => 'id', 'visible' => false],
                    [
                        'attribute' => 'event.nama_event',
                        'label' => 'Event',
                    ],
                    [
                       'attribute' => 'jenis.kode_jenis',
                       'label' => 'Jenis',
                   ],
                    'kode_pembayaran',
                    'kode_tiket',
                    'status',
                ];
                echo DetailView::widget([
                    'model' => $model,
                    'attributes' => $gridColumn
                ]); 
            ?>
        </div>
        <div class="col-md-2">
            <img src="<?= Url::to(['tiket/qrcode', 'id' => $model->id])?>" />
        </div>
        

    </div>
    <div class="row">
        <div class="col-sm-4" style="margin-top: 15px">
        <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>
            <?= Html::a('Save As New', ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>
    
</div>
