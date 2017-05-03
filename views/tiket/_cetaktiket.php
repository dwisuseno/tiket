<?php

use yii\helpers\Html;
use app\models\Login;
use app\models\Event;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Tiket */
function nama($model)
{
    $username = Event::find()->where(['id' => $model->event_id])->asArray()->one();
    //var_dump($username);
    return $username['nama_event'];
}

function user($model)
{
    $user = Login::find()->where(['id' => $model->user_id])->asArray()->one();
    //var_dump($username);
    return $user['username'];
}



$this->title = nama($model);
$this->params['breadcrumbs'][] = ['label' => 'Tiket', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiket-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Tiket:'.' '. Html::encode($this->title) ?></h2>
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
                'label' => 'Nama User',
                'value' => user($model)
        ],
        //'user_id',
        'kode_pembayaran',
        'kode_tiket',
        [
                'label' => 'Status',
                'value' => 'Lunas'
        ],
        //'status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">


    </div>
</div>
