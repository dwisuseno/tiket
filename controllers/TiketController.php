<?php

namespace app\controllers;

use Yii;
use app\models\Tiket;
use app\models\Event;
use app\models\EventSearch;
use app\models\TiketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use dosamigos\qrcode\QrCode;


/**
 * TiketController implements the CRUD actions for Tiket model.
 */
class TiketController extends Controller
{
    public function behaviors()
    {
        return [
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         'delete' => ['post'],
            //     ],
            // ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                //'only' => [],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index','pemesanan','lihatevent'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Tiket models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TiketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tiket model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tiket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function generateUniqueRandomString( $length) {
            
        $randomString = Yii::$app->getSecurity()->generateRandomString($length);
        //$model = Tiket::findOne($randomString);
        $model = Tiket::find()->where(['kode_tiket' => $randomString])->count(); 
        // var_dump($model);
        // exit();
        if($model == "0")
            return $randomString;
        else
            return $this->generateUniqueRandomString( $length);
                
    }

    public function actionCreate()
    {
        $model = new Tiket();
        //$modelEvent = new Event();

        if ($model->loadAll(Yii::$app->request->post())) {
            // generate random string
            $model->kode_pembayaran = $this->generateUniqueRandomString(5);

            // mengupdate data tiket untuk dikurangi - 1
            $event = Event::findOne((int)$model->event_id);
            $event->jumlah_tiket = $event->jumlah_tiket - 1;
            $event->update();
            $model->save(false);

            
            $model->saveAll();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tiket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new Tiket();
        }else{
            $model = $this->findModel($id);
        }

        if ($model->loadAll(Yii::$app->request->post()) ) {
            $model->saveAll();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tiket model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * Export Tiket information into PDF format.
     * @param integer $id
     * @return mixed
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
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

    /**
    * Creates a new Tiket model by another data,
    * so user don't need to input all field from scratch.
    * If creation is successful, the browser will be redirected to the 'view' page.
    *
    * @param type $id
    * @return type
    */
    public function actionSaveAsNew($id) {
        $model = new Tiket();

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
    
    /**
     * Finds the Tiket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tiket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tiket::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionQrcode($id) {
        $model = Tiket::findOne($id);
        return QrCode::png($model->kode_tiket);
        // you could also use the following
        // return return QrCode::png($mailTo);
    }

    public function actionLihatevent(){
        $model = Event::find()->asArray()->orderBy('tgl_event')->all();
        return $this->render('event',[
                'model' => $model,
            ]);
    }

    public function actionPemesanan($id){
        $model = Event::find()->where(['id' => $id])->asArray()->one();
        $tiket = new Tiket();
        return $this->render('pemesanan',[
                'model' => $model,
                'tiket' => $tiket,
            ]);
    }
    
    // fungsi pemesanan tiket
    public function actionPesantiket(){
        $model = new Tiket();

        if ($model->loadAll(Yii::$app->request->post())) {
            $model->kode_pembayaran = $this->generateUniqueRandomString(5);

            // mengupdate data tiket untuk dikurangi - 1
            $event = Event::findOne($model->event_id);
            $event->jumlah_tiket = $event->jumlah_tiket - $model->jumlah_tiket;
            $event->save(false);
            $event->update();

            $model->event_id = (int)$model->event_id;
            $model->save(false);
            // echo "<pre>";
            // var_dump($tiket->kode_pembayaran);
            // echo "</pre>";
            // exit();

            $model->saveAll();
            return $this->render('pembayaran');
        } else {
            
        }
    }
    
    
}
