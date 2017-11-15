<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Counter;
use app\models\User;
use app\models\Login;
use app\models\LoginSearch;


	public function actionIndexHome()
    {
        $model = Counter::findOne(1);
        $model->count_home = $model->count_home + 1;
        $model->save();
        return $this->render('index');
    }

    public function actionRegister()
    {
        $model = new LoginForm();
        return $this->render('register',
            [
                'model' => $model,
            ]);
    }
    
    public function actionDoregister()
    {
        $model = new LoginForm();
        if($model->load(Yii::$app->request->post()) && User::findByUsername($model->username) == NULL)
        {
            //$user = User::findByUsername($model->username);
            $new_user = new Login();
            $new_user->username = $model->username;
            $new_user->password = $model->password;
            $new_user->role = "user";
            $new_user->save();
            $this->redirect(['login']);
        }
        else
        {
            $model->addError('username', 'Username sudah terdaftar. Gunakan username yang lain');
            return $this->render('register', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionProfil()
    {
        return $this->render('profil');
    }

    public function actionLayanan()
    {
        return $this->render('layanan');
    }



    public function actionUser()
    {
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

    public function actionIndexUser()
    {
        $searchModel = new LoginSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateUser()
    {
        $model = new Login();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateUser($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new Login();
        }else{
            $model = $this->findModel($id);
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeleteUser($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    public function actionViewUser($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionIndexEvent()
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

    public function actionCreateEvent()
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

    public function actionUpdateEvent($id)
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

    public function actionDeleteEvent($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    public function actionViewEvent($id)
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

        if(Yii::$app->user->identity != null && Yii::$app->user->identity->role != 'admin')
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

    public function actionIndexTiket()
    {
        $searchModel = new TiketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateTiket()
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

    public function actionUpdateTiket($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new Tiket();
        }else{
            $model = $this->findModel($id);
        }

        if ($model->loadAll(Yii::$app->request->post())) {
            if($model->status == 1){
                $model->kode_tiket = generateKodeTiket(4);
            }
            $model->saveAll();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionViewTiket($id)
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

    public function actionDeleteTiket($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

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

	function generateKodePembayaran($digits)
	{
	    $randNumber = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
	    $model = Tiket::find()->where(['kode_pembayaran' => $randNumber])->count();
	    if($model == "0")
	        return $randNumber;
	    else
	        return $this->randGenerator( $digits);
	}

	function generateKodeTiket($digits)
	{
	    $randNumber = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
	    $model = Tiket::find()->where(['kode_tiket' => $randNumber])->count();
	    if($model == "0")
	        return $randNumber;
	    else
	        return $this->randGenerator( $digits);
	}

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
		$kode_pembayaran = generateKodePembayaran(4);
        $tiket->kode_pembayaran = $kode_pembayaran;
        
        // mengupdate data tiket untuk dikurangi - 1
		$event = Event::findOne($event_id);
        
        $event->jumlah_tiket = $event->jumlah_tiket - 1;
        $event->tiket_terjual = $event->tiket_terjual + 1;
        $event->save(false);
        $event->update();

        $tiket->event_id = $event_id;
        $tiket->user_id = Yii::$app->user->identity->id;
        $tiket->harga = $event->harga_ps;
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
            'kode_pembayaran' => $kode_pembayaran,
            ]);
    }

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
        
        $kode_pembayaran = generateKodePembayaran(4);
        $tiket->event_id = $event_id;
        $tiket->user_id = Yii::$app->user->identity->id;
        $tiket->kode_pembayaran = $kode_pembayaran;
        $tiket->harga = $event->harga_ps;
        $flag = $tiket->save(false);
       
        $tiket->saveAll();
        if($flag){
            Yii::$app->session->setFlash('warning', 'Terima Kasih Sudah Membeli Tiket');
        } else {
            Yii::$app->session->setFlash('warning', 'Tiket Belum Terbeli');
        }
        return $this->render('success', [
                  'kode_pembayaran' => $kode_pembayaran,
        ]);
    }

    public function actionCektiket(){
        //$model = Tiket::find()->asArray()->orderBy('created_at')->where(['user_id' => Yii::$app->user->identity->id])->all();
        $model = Tiket::find()->asArray()->where(['user_id' => Yii::$app->user->identity->id])->leftJoin('event', 'tiket.event_id=event.id')->orderBy('tiket.created_at')->select("tiket.id as id, tiket.event_id as event_id, tiket.user_id as user_id, tiket.kode_pembayaran as kode_pembayaran, tiket.kode_tiket as kode_tiket, tiket.harga as harga,tiket.status as status, tiket.created_at as created_at, event.nama_event as nama_event, event.tgl_event as tgl_event")->all();
          // echo "<pre>";
          // var_dump($model);
          // echo "</pre>";
          return $this->render('cektiket',[
                  'model' => $model,
              ]);
    }

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

?>