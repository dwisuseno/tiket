<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Event', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Event'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'nama_event',
        'tgl_event',
        'waktu_event',
        'jumlah_tiket',
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
