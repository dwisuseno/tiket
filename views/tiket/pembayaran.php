<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\url;

$this->title = "Success";

?>
<?php if(Yii::$app->session->getFlash('warning')){ ?>
<div class="alert alert-success">
  <strong>Success!</strong> <?= Yii::$app->session->getFlash('warning'); ?>.
  <br>
  <strong>Segera lakukan pembayaran dengan mencantumkan kode pembayaran ketika transaksi</strong>
  <br>
  <strong>Kode Pembayaran Tiket anda: <?php echo $kode_pembayaran?></strong>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Review</h3>
		  </div>
		  <div class="panel-body">
		    <?php $form = ActiveForm::begin([
			    'method' => 'post',
			    'action' => ['tiket/review', 'id' => $model['id']],
			]); ?>
		    <div class="row">
				<div class="col-md-12">
					<?= $form->field($modelreview, 'isi')->textArea(['rows' => '6','placeholder' => 'Description']) ?>
				</div>
			</div>
		    <div class="row">
				<div class="col-md-6">
					<?= Html::submitButton('Review', ['class' => 'btn btn-primary']) ?>
				</div>
			</div>
			<?php ActiveForm::end(); ?><br><br>
		  </div>
		</div>
	</div>
</div>
<?php }?>
