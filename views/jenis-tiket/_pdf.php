<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\JenisTiket */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Tiket', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-tiket-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Jenis Tiket'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'kode_jenis',
        'nama',
        'harga',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerTiket->totalCount){
    $gridColumnTiket = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'event.id',
                'label' => 'Event'
            ],
                'kode_tiket',
        'status',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerTiket,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Tiket'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnTiket
    ]);
}
?>
    </div>
</div>
