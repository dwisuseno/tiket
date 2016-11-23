<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\url;

$this->title = "Pemesanan";
// echo "<pre>";
// var_dump(Yii::$app->user->identity);
// echo "</pre>";
// exit();
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
				<div class="col-md-3">
					
					
				</div>
				<div class="col-md-3 col-lg-3 col-sm-3">
					<?php //echo $form->field($tiket, 'jumlah_tiket')->textInput(['placeholder' => 'Jumlah Tiket', 'type' => 'number']); ?>
				</div>
				
				
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<?= Html::submitButton('Reserve Ticket', ['class' => 'btn btn-success']) ?>
					<a href="index.php?r=tiket/lihatevent" class="btn btn-primary">Back</a>
				</div>
			</div>
			
			<?php ActiveForm::end(); ?>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Where & Where</h3>
			  </div>
			  <div class="panel-body">
			    <strong>Where</strong>
			    <p><?= $model['alamat'] ?></p>
			    <strong>When</strong>
			    <p>Date: <?= date("D, j F Y", strtotime($model['tgl_event'])) ?></p>
			    <p>Open Gate: <?= date("g:i a", strtotime($model['waktu_event'])) ?></p>
			  </div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Ticket</h3>
			  </div>
			  <div class="panel-body">
			  	<table class="table">
			  		<tr>
			  			<td><strong>Your Name</strong></td>
			  			<td><strong>Your Ticket</strong></td>
			  		</tr>
			  		<tr>
			  			<td><?= Yii::$app->user->identity->username ?></td>
			  			<td>1 Ticket</td>
			  		</tr>
			  	</table>
			    
			    
			  </div>
			</div>
		</div>
	</div>
</div>