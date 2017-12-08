<?php
namespace app\controllers;
use Yii;
use app\models\Event;
use app\models\EventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

class EventController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                //'only' => [],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','view','create','update','delete','saveAsNew', 'preview'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }
    public function actionIndex()
    {
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $nama = "Andi Anak Bapak";

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'budi' => $nama,
        ]);
    }
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerTiket = new \yii\data\ArrayDataProvider([
            'allModels' => $model->tikets,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerTiket' => $providerTiket,
        ]);
    }
    public function actionCreate()
    {
        $model = new Event();
        if ($model->loadAll(Yii::$app->request->post())) {
            $index = Event::find()->max('id');
            $index++;
            $imagename = $model->nama_event.'_'.$index;
            //create directory to save file picture
            $dir = 'uploads/event/'.$model->nama_event.'_'.$index;
            mkdir($dir);
            $model->file = UploadedFile::getInstance($model,'file');
            $model->file_gambar1 = UploadedFile::getInstance($model,'file_gambar1');
            $model->file_gambar2 = UploadedFile::getInstance($model,'file_gambar2');
            $model->file_gambar3 = UploadedFile::getInstance($model,'file_gambar3');
            $model->file_gambar4 = UploadedFile::getInstance($model,'file_gambar4');
            $model->file_gambar5 = UploadedFile::getInstance($model,'file_gambar5');
            $model->file_gambar6 = UploadedFile::getInstance($model,'file_gambar6');
            $model->file_gambar7 = UploadedFile::getInstance($model,'file_gambar7');
            $model->file_gambar8 = UploadedFile::getInstance($model,'file_gambar8');
            $model->file_gambar9 = UploadedFile::getInstance($model,'file_gambar9');
            if($model->file){
                $model->file->saveAs('uploads/foto/'.$imagename.'.'.$model->file->extension);
                // save the path in the db column
                $model->path_gambar = 'uploads/foto/'.$imagename.'.'.$model->file->extension;
            }
            if($model->file_gambar1){
                $model->file_gambar1->saveAs($dir.'/'.$imagename.'_1.'.$model->file_gambar1->extension);
                // save the path in the db column
                $model->gambar1 = $dir.'/'.$imagename.'_1.'.$model->file_gambar1->extension;
            }
            if($model->file_gambar2){
                $model->file_gambar2->saveAs($dir.'/'.$imagename.'_2.'.$model->file_gambar2->extension);
                // save the path in the db column
                $model->gambar2 = $dir.'/'.$imagename.'_2.'.$model->file_gambar2->extension;
            }
            if($model->file_gambar3){
                $model->file_gambar3->saveAs($dir.'/'.$imagename.'_3.'.$model->file_gambar3->extension);
                // save the path in the db column
                $model->gambar3 = $dir.'/'.$imagename.'_3.'.$model->file_gambar3->extension;
            }
            if($model->file_gambar4){
                $model->file_gambar4->saveAs($dir.'/'.$imagename.'_4.'.$model->file_gambar4->extension);
                // save the path in the db column
                $model->gambar4 = $dir.'/'.$imagename.'_4.'.$model->file_gambar4->extension;
            }
            if($model->file_gambar5){
                $model->file_gambar5->saveAs($dir.'/'.$imagename.'_5.'.$model->file_gambar5->extension);
                // save the path in the db column
                $model->gambar5 = $dir.'/'.$imagename.'_5.'.$model->file_gambar5->extension;
            }
            if($model->file_gambar6){
                $model->file_gambar6->saveAs($dir.'/'.$imagename.'_6.'.$model->file_gambar6->extension);
                // save the path in the db column
                $model->gambar6 = $dir.'/'.$imagename.'_6.'.$model->file_gambar6->extension;
            }
            if($model->file_gambar7){
                $model->file_gambar7->saveAs($dir.'/'.$imagename.'_7.'.$model->file_gambar7->extension);
                // save the path in the db column
                $model->gambar7 = $dir.'/'.$imagename.'_7.'.$model->file_gambar7->extension;
            }
            if($model->file_gambar8){
                $model->file_gambar8->saveAs($dir.'/'.$imagename.'_8.'.$model->file_gambar8->extension);
                // save the path in the db column
                $model->gambar8 = $dir.'/'.$imagename.'_8.'.$model->file_gambar8->extension;
            }
            if($model->file_gambar9){
                $model->file_gambar9->saveAs($dir.'/'.$imagename.'_9.'.$model->file_gambar9->extension);
                // save the path in the db column
                $model->gambar9 = $dir.'/'.$imagename.'_9.'.$model->file_gambar9->extension;
            }
            $model->saveAll();
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionUpdate($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new Event();
        }
        else{
            $model = $this->findModel($id);
        }
        if ($model->loadAll(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model,'file');
            $model->file_gambar1 = UploadedFile::getInstance($model,'file_gambar1');
            $model->file_gambar2 = UploadedFile::getInstance($model,'file_gambar2');
            $model->file_gambar3 = UploadedFile::getInstance($model,'file_gambar3');
            $model->file_gambar4 = UploadedFile::getInstance($model,'file_gambar4');
            $model->file_gambar5 = UploadedFile::getInstance($model,'file_gambar5');
            $model->file_gambar6 = UploadedFile::getInstance($model,'file_gambar6');
            $model->file_gambar7 = UploadedFile::getInstance($model,'file_gambar7');
            $model->file_gambar8 = UploadedFile::getInstance($model,'file_gambar8');
            $model->file_gambar9 = UploadedFile::getInstance($model,'file_gambar9');
            $imagename = $model->nama_event.'_'.$id;
            $dir = 'uploads/event/'.$model->nama_event.'_'.$id;
            //echo "$imagename";
            //echo "$dir";
            if(is_dir($dir))
            {
                if($model->file){
                $model->file->saveAs('uploads/foto/'.$imagename.'.'.$model->file->extension);
                // save the path in the db column
                $model->path_gambar = 'uploads/foto/'.$imagename.'.'.$model->file->extension;
                }
                if($model->file_gambar1){
                    $model->file_gambar1->saveAs($dir.'/'.$imagename.'_1.'.$model->file_gambar1->extension);
                    // save the path in the db column
                    $model->gambar1 = $dir.'/'.$imagename.'_1.'.$model->file_gambar1->extension;
                }
                if($model->file_gambar2){
                    $model->file_gambar2->saveAs($dir.'/'.$imagename.'_2.'.$model->file_gambar2->extension);
                    // save the path in the db column
                    $model->gambar2 = $dir.'/'.$imagename.'_2.'.$model->file_gambar2->extension;
                }
                if($model->file_gambar3){
                    $model->file_gambar3->saveAs($dir.'/'.$imagename.'_3.'.$model->file_gambar3->extension);
                    // save the path in the db column
                    $model->gambar3 = $dir.'/'.$imagename.'_3.'.$model->file_gambar3->extension;
                }
                if($model->file_gambar4){
                    $model->file_gambar4->saveAs($dir.'/'.$imagename.'_4.'.$model->file_gambar4->extension);
                    // save the path in the db column
                    $model->gambar4 = $dir.'/'.$imagename.'_4.'.$model->file_gambar4->extension;
                }
                if($model->file_gambar5){
                    $model->file_gambar5->saveAs($dir.'/'.$imagename.'_5.'.$model->file_gambar5->extension);
                    // save the path in the db column
                    $model->gambar5 = $dir.'/'.$imagename.'_5.'.$model->file_gambar5->extension;
                }
                if($model->file_gambar6){
                    $model->file_gambar6->saveAs($dir.'/'.$imagename.'_6.'.$model->file_gambar6->extension);
                    // save the path in the db column
                    $model->gambar6 = $dir.'/'.$imagename.'_6.'.$model->file_gambar6->extension;
                }
                if($model->file_gambar7){
                    $model->file_gambar7->saveAs($dir.'/'.$imagename.'_7.'.$model->file_gambar7->extension);
                    // save the path in the db column
                    $model->gambar7 = $dir.'/'.$imagename.'_7.'.$model->file_gambar7->extension;
                }
                if($model->file_gambar8){
                    $model->file_gambar8->saveAs($dir.'/'.$imagename.'_8.'.$model->file_gambar8->extension);
                    // save the path in the db column
                    $model->gambar8 = $dir.'/'.$imagename.'_8.'.$model->file_gambar8->extension;
                }
                if($model->file_gambar9){
                    $model->file_gambar9->saveAs($dir.'/'.$imagename.'_9.'.$model->file_gambar9->extension);
                    // save the path in the db column
                    $model->gambar9 = $dir.'/'.$imagename.'_9.'.$model->file_gambar9->extension;
                }
            }
            else
            {
                mkdir($dir);
                if($model->file){
                    $model->file->saveAs('uploads/foto/'.$imagename.'.'.$model->file->extension);
                    // save the path in the db column
                    $model->path_gambar = 'uploads/foto/'.$imagename.'.'.$model->file->extension;
                }
                if($model->file_gambar1){
                    $model->file_gambar1->saveAs($dir.'/'.$imagename.'_1.'.$model->file->extension);
                    // save the path in the db column
                    $model->gambar1 = $dir.'/'.$imagename.'_1.'.$model->file->extension;
                }
                if($model->file_gambar2){
                    $model->file_gambar2->saveAs($dir.'/'.$imagename.'_2.'.$model->file->extension);
                    // save the path in the db column
                    $model->gambar2 = $dir.'/'.$imagename.'_2.'.$model->file->extension;
                }
                if($model->file_gambar3){
                    $model->file_gambar3->saveAs($dir.'/'.$imagename.'_3.'.$model->file->extension);
                    // save the path in the db column
                    $model->gambar3 = $dir.'/'.$imagename.'_3.'.$model->file->extension;
                }
                if($model->file_gambar4){
                    $model->file_gambar4->saveAs($dir.'/'.$imagename.'_4.'.$model->file->extension);
                    // save the path in the db column
                    $model->gambar4 = $dir.'/'.$imagename.'_4.'.$model->file->extension;
                }
                if($model->file_gambar5){
                    $model->file_gambar5->saveAs($dir.'/'.$imagename.'_5.'.$model->file->extension);
                    // save the path in the db column
                    $model->gambar5 = $dir.'/'.$imagename.'_5.'.$model->file->extension;
                }
                if($model->file_gambar6){
                    $model->file_gambar6->saveAs($dir.'/'.$imagename.'_6.'.$model->file->extension);
                    // save the path in the db column
                    $model->gambar6 = $dir.'/'.$imagename.'_6.'.$model->file->extension;
                }
                if($model->file_gambar7){
                    $model->file_gambar7->saveAs($dir.'/'.$imagename.'_7.'.$model->file->extension);
                    // save the path in the db column
                    $model->gambar7 = $dir.'/'.$imagename.'_7.'.$model->file->extension;
                }
                if($model->file_gambar8){
                    $model->file_gambar8->saveAs($dir.'/'.$imagename.'_8.'.$model->file->extension);
                    // save the path in the db column
                    $model->gambar8 = $dir.'/'.$imagename.'_8.'.$model->file->extension;
                }
                if($model->file_gambar9){
                    $model->file_gambar9->saveAs($dir.'/'.$imagename.'_9.'.$model->file->extension);
                    // save the path in the db column
                    $model->gambar9 = $dir.'/'.$imagename.'_9.'.$model->file->extension;
                }
            }
            $model->saveAll();
            clearstatcache();
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    public function actionPdf($id) {
        $model = $this->findModel($id);
        $providerTiket = new \yii\data\ArrayDataProvider([
            'allModels' => $model->tikets,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerTiket' => $providerTiket,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }
    public function actionSaveAsNew($id) {
        $model = new Event();

        if (Yii::$app->request->post('_asnew') != '1') {
            $model = $this->findModel($id);
        }
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('saveAsNew', [
                'model' => $model,
            ]);
        }
    }
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionAddTiket()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Tiket');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formTiket', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function add()
    {
        return;
    }
}
