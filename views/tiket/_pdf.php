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
            [ 
               'attribute' => 'jenis.kode_jenis', 
               'label' => 'Jenis' 
           ],
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
