<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\modules\tiket\models\Likert */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Likert', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="likert-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Likert'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'kelas_a',
        'kelas',
        'kelas_c',
        'kelas_d',
        'kelas_e',
        'total',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
