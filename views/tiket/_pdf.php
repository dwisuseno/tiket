<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Tiket */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tiket', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiket-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Tiket'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'event.nama_event',
                'label' => 'Event'
            ],
        'user_id',
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
    
    <div class="row">
<?php
if($providerJenisTiket->totalCount){
    $gridColumnJenisTiket = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
                'kode_jenis',
        'nama',
        'harga',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerJenisTiket,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Jenis Tiket'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnJenisTiket
    ]);
}
?>
    </div>
</div>
