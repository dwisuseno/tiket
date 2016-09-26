<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\url;

$this->title = "Pemesanan";

?>

<div class="site-index">
	<div class="row">
		<div class="col-md-4">
			<img style="height:200px" src="<?= $model['path_gambar'] ?>" alt="<?= $model['nama_event'] ?>">
		</div>
		<div class="col-md-8">
			<font size="6"><?= $model['nama_event'] ?></font><br>
			<font size="3"><?= $model['jumlah_tiket'] ?> tickets</font><br>
			<font size="4">Date: <?= date("D, j F Y", strtotime($model['tgl_event'])) ?></font><br>
			<font size="3">Open Gate: <?= date("g:i a", strtotime($model['waktu_event'])) ?></font><br>
            <font size="3"><?= $model['alamat'] ?> </font><br>
            <?php $form = ActiveForm::begin([
				//'layout' => 'horizontal',
			    'method' => 'post',
			    'action' => ['tiket/pesantiket'],

			]); ?>
			<?= $form->errorSummary($tiket); ?>

			<?= $form->field($tiket, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
			<?= $form->field($tiket, 'event_id', ['template' => '{input}'])->textInput(['style' => 'display:none','value'=>$model['id']]); ?>
			<div class="row">
				<div class="col-md-3 col-lg-3 col-sm-3">
					<?php //$form->field($tiket, 'jumlah_tiket')->textInput(['placeholder' => 'Jumlah Tiket', 'type' => 'number']); ?>
				</div>
				<div class="col-md-3">
					
					<?php //echo $form->field($tiket, 'jenis_id')->widget(\kartik\widgets\Select2::classname(), [
	               //     'data' => \yii\helpers\ArrayHelper::map(\app\models\JenisTiket::find()->orderBy('id')->asArray()->all(), 'id', 'kode_jenis'),
	               //     'options' => ['placeholder' => 'Choose Jenis tiket'],
	               //     'pluginOptions' => [
	               //         'allowClear' => true
	               //     ],
	               // ]); ?>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<?= Html::submitButton('Pesan Tiket', ['class' => 'btn btn-success']) ?>
					<a href="index.php?r=tiket/lihatevent" class="btn btn-primary">Kembali</a>
				</div>
			</div>
			
			<?php ActiveForm::end(); ?>
		</div>
	</div>
	
</div>