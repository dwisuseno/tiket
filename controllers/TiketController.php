<?php

namespace app\controllers;

use Yii;
use app\models\Tiket;
use app\models\Event;
use app\models\Review;
use app\models\Login;
use app\models\TiketSearch;
use app\models\Likert;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

function hasil_likert($a, $b, $c, $d, $e, $total)
    {
        $Y = $total * 5;
        $Sa = $a * 5;
        $Sb = $b * 4;
        $Sc = $c * 3;
        $Sd = $d * 2;
        $Se = $e * 1;

        $TS = $Sa + $Sb + $Sc + $Sd + $Se;

        $index = $TS * 100 / $Y;

        return $index;
    }

/**
 * TiketController implements the CRUD actions for Tiket model.
 */
class TiketController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                //'only' => ['lihatevent'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['updateuser','user','review','index','view','create','update','delete','saveAsNew','lihatevent','preview','pesantiket','cektiket','cetaktiket', 'pesantiketlangsung', 'reviewsubmitted', 'hasil_likert'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['lihatevent'],
                        'roles' => ['?'],
                    ]
                ]
            ]
        ];
    }

    public function actionUser(){
        $model = Login::findOne(Yii::$app->user->identity->id);
        return $this->render('user_update', [
            'model' => $model,
        ]);
    }

    public function actionUpdateuser(){
        $model = Login::findOne(Yii::$app->user->identity->id);
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->render('user_update', [
                'model' => $model,
            ]);
        } else {
            return $this->render('user_update', [
                'model' => $model,
            ]);
        }
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
        $providerJenisTiket = new \yii\data\ArrayDataProvider([
            'allModels' => $model->jenisTikets,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerJenisTiket' => $providerJenisTiket,
        ]);
    }

    /**
     * Creates a new Tiket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tiket();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
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

        if ($model->loadAll(Yii::$app->request->post())) {
            if($model->status == 1){
                $model->kode_tiket = $this->generateUniqueRandomString(5);
            }
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
        $providerJenisTiket = new \yii\data\ArrayDataProvider([
            'allModels' => $model->jenisTikets,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerJenisTiket' => $providerJenisTiket,
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
    
    /**
    * Action to load a tabular form grid
    * for JenisTiket
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddJenisTiket()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('JenisTiket');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formJenisTiket', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLihatevent(){
        $model = Event::find()->asArray()->orderBy(['tgl_event' => SORT_DESC])->all();
        
        //var_dump(Yii::$app->user->identity->role);
        
        if(Yii::$app->user->identity != null && Yii::$app->user->identity->role != 'admin')
        {
            $likert = Likert::findOne(1);
            $likert->kelas_e = $likert->kelas_e + 1;
            $likert->total = $likert->total + 1;
            $likert->hasil = hasil_likert($likert->kelas_a, $likert->kelas_b, $likert->kelas_c, $likert->kelas_d, $likert->kelas_e, $likert->total);
            $likert->save();
        }
        
        return $this->render('event',[
                'model' => $model,
            ]);
    }

    public function actionPreview($id){
        $model = Event::find()->where(['id' => $id])->asArray()->one();
        $c = Event::findOne($id);
        $c->count = $c->count + 1;
        $c->save();

        if(Yii::$app->user->identity->role != 'admin')
        {
            $likert = Likert::findOne(1);
            $likert->kelas_d = $likert->kelas_d + 1;
            $likert->kelas_e = $likert->kelas_e - 1;
            $likert->hasil = hasil_likert($likert->kelas_a, $likert->kelas_b, $likert->kelas_c, $likert->kelas_d, $likert->kelas_e, $likert->total);
            $likert->save();
        }
		
        $tiket = new Tiket();
        $reviewContent =Review::find()->where(['event_id' => $id])->asArray()->all();
        $modelreview = new Review();

        return $this->render('pemesanan',[
                'model' => $model,
                'tiket' => $tiket,
                'reviewContent' => $reviewContent,
                'modelreview' => $modelreview,
            ]);
    }

    public function actionReview($id){
        $model = new Review();
        $likert = Likert::findOne(1);

        if ($model->load(Yii::$app->request->post())) 
        {
            if(Yii::$app->user->identity->role != 'admin')
            {
                $likert->kelas_a = $likert->kelas_a + 1;
                $likert->kelas_b = $likert->kelas_b - 1;
                $likert->hasil = hasil_likert($likert->kelas_a, $likert->kelas_b, $likert->kelas_c, $likert->kelas_d, $likert->kelas_e, $likert->total);
                $likert->save();
            }

            $model->event_id = $id;
            $model->save();
            $flag = $model->save(false);

            if($flag)
            {
                Yii::$app->session->setFlash('warning', 'Terima Kasih Sudah Mereview Event Ini');
            } 
            else 
            {
                Yii::$app->session->setFlash('warning', 'Data Gagal Disimpan');
            }   
        }
        return $this->render('reviewsubmitted');
        //return $this->redirect(['preview', 'id' => $id]);
    }

    public function actionReviewsubmitted($id){
        $model = new Review();

        if ($model->load(Yii::$app->request->post())) 
        {
            $model->event_id = $id;
            $model->save();
            $flag = $model->save(false);

            if($flag)
            {
                Yii::$app->session->setFlash('warning', 'Terima Kasih Sudah Mereview Event Ini');
            } 
            else 
            {
                Yii::$app->session->setFlash('warning', 'Data Gagal Disimpan');
            }
        }
        return $this->render('reviewsubmitted');
    }
    
    // fungsi pemesanan tiket melalui Detail Event
    public function actionPesantiket($event_id){		
        $tiket = new Tiket();

        if(Yii::$app->user->identity->role != 'admin')
        {
            $likert = Likert::findOne(1);
            $likert->kelas_b = $likert->kelas_b + 1;
            $likert->kelas_d = $likert->kelas_d - 1;
            $likert->hasil = hasil_likert($likert->kelas_a, $likert->kelas_b, $likert->kelas_c, $likert->kelas_d, $likert->kelas_e, $likert->total);
            $likert->save();
        }
		
        $tiket->kode_pembayaran = $this->generateUniqueRandomString(5);

        // mengupdate data tiket untuk dikurangi - 1
		$event = Event::findOne($event_id);
        
        $event->jumlah_tiket = $event->jumlah_tiket - 1;
        $event->tiket_terjual = $event->tiket_terjual + 1;
        $event->save(false);
        $event->update();

        $tiket->event_id = $event_id;
        $tiket->user_id = Yii::$app->user->identity->id;
        $flag = $tiket->save(false);
       
        $tiket->saveAll();
        if($flag){
            Yii::$app->session->setFlash('warning', 'Terima Kasih Sudah Membeli Tiket');
        } else {
            Yii::$app->session->setFlash('warning', 'Data Gagal Disimpan');
        }
        $modelreview = new Review();
        return $this->render('pembayaran',[
            'model' => $event,
            'modelreview' => $modelreview,
            ]);

    }

    // fungsi pemesanan tiket langsung tanpa melalui Detail Event
	public function actionPesantiketlangsung($event_id){
        $tiket = new Tiket();
		if(Yii::$app->user->identity->role != 'admin')
        {
            $likert = Likert::findOne(1);
            $likert->kelas_c = $likert->kelas_c + 1;
            $likert->kelas_e = $likert->kelas_e - 1;
            $likert->hasil = hasil_likert($likert->kelas_a, $likert->kelas_b, $likert->kelas_c, $likert->kelas_d, $likert->kelas_e, $likert->total);
            $likert->save();
        }

        $event = Event::findOne($event_id);
        $event->jumlah_tiket = $event->jumlah_tiket - 1;
        $event->tiket_terjual = $event->tiket_terjual + 1;
        $event->save(false);
        $event->update();

        $tiket->event_id = $event_id;
        $tiket->user_id = Yii::$app->user->identity->id;
        $flag = $tiket->save(false);
       
        $tiket->saveAll();
        if($flag){
            Yii::$app->session->setFlash('warning', 'Terima Kasih Sudah Membeli Tiket');
        } else {
            Yii::$app->session->setFlash('warning', 'Tiket Belum Terbeli');
        }
        return $this->render('success');
    }

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

    public function actionCektiket(){
        //$model = Tiket::find()->asArray()->orderBy('created_at')->where(['user_id' => Yii::$app->user->identity->id])->all();
        $model = Tiket::find()->asArray()->where(['user_id' => Yii::$app->user->identity->id])->leftJoin('event', 'tiket.event_id=event.id')->orderBy('tiket.created_at')->select("tiket.id as id, tiket.event_id as event_id, tiket.user_id as user_id, tiket.kode_pembayaran as kode_pembayaran, tiket.kode_tiket as kode_tiket, tiket.status as status, tiket.created_at as created_at, event.nama_event as nama_event, event.tgl_event as tgl_event")->all();
          // echo "<pre>";
          // var_dump($model);
          // echo "</pre>";
          return $this->render('cektiket',[
                  'model' => $model,
              ]);
    }

    //FUngsi cetak tiket
    public function actionCetaktiket($id){
        $model = $this->findModel($id);
        $namauser = Login::find()->where(['id' => $model->user_id])->asArray()->one();

        $content = $this->renderAjax('_cetaktiket', [
            'model' => $model,
            'namauser' => $namauser,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_UTF8,
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
}
