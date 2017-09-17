<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\Event */
$this->title = $model->nama_event;
$this->params['breadcrumbs'][] = ['label' => 'Event', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->nama_event;
?>
<div class="event-view">
    <div class="row">
        <div class="col-sm-8">
            <h2><?= 'Event'.' '. Html::encode($this->title) ?></h2>
        </div><!--
        <div class="col-sm-4" style="margin-top: 15px">
            <?= Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ])?>
            <?= Html::a('Save As New', ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])?>
        </div>-->
    </div>
    <div class="row">    
        <img style="height:200px" src="<?= $model['path_gambar'] ?>?cache=<?php echo time(); ?>" alt="<?= $model['path_gambar'] ?>">
    </div>
	</br>
    <div class="row">
        <?php 
            $gridColumn = [
                ['attribute' => 'id', 'visible' => false],
                'nama_event',
                'tgl_event',
                'waktu_event',
                'alamat',
                'jumlah_tiket',
                'deskripsi',
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
                    'pjax' => true,
                    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-tiket']],
                    'panel' => [
                        'type' => GridView::TYPE_PRIMARY,
                        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Tiket'),
                    ],
                    'columns' => $gridColumnTiket
                ]);
            }
        ?>  
    </div>
    </div>
    
    <?php if($model['gambar1'] != NULL || $model['gambar2'] != NULL || $model['gambar3'] != NULL) { ?>
    <div class="row">
        <?php if($model['gambar1'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar1'] ?>">
            </div>
        </div>
        <?php } ?>
        <?php if($model['gambar2'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar2'] ?>">
            </div>
        </div>
        <?php } ?>
        <?php if($model['gambar3'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar3'] ?>">
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <?php if($model['gambar4'] != NULL || $model['gambar5'] != NULL || $model['gambar6'] != NULL) { ?>
    <div class="row">
        <?php if($model['gambar4'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar4'] ?>">
            </div>
        </div>
        <?php } ?>
        <?php if($model['gambar5'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar5'] ?>">
            </div>
        </div>
        <?php } ?>
        <?php if($model['gambar6'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar6'] ?>">
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <?php if($model['gambar7'] != NULL || $model['gambar8'] != NULL || $model['gambar9'] != NULL) { ?>
    <div class="row">
        <?php if($model['gambar7'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar7'] ?>">
            </div>
        </div>
        <?php } ?>
        <?php if($model['gambar8'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar8'] ?>">
            </div>
        </div>
        <?php } ?>
        <?php if($model['gambar9'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar9'] ?>">
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
