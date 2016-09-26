<div class="form-group" id="add-tiket">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Tiket',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'event_id' => [
            'label' => 'Event',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Event::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Event'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'kode_tiket' => ['type' => TabularForm::INPUT_TEXT],
        'status' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ '0', '1', '2', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => 'Choose Status'],
                    ]
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowTiket(' . $key . '); return false;', 'id' => 'tiket-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Tiket', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowTiket()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

