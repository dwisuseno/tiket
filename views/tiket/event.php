<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = "Choose Event";
?>

<div class="site-index">
	<div class="row">
	<?php 
		for ($i=0; $i < sizeof($model); $i++) { 
	?>
	<?php $form = ActiveForm::begin(); ?>
	  <div class="col-sm-12 col-md-4">
	    <div class="thumbnail">
	      <img style="height:200px" src="<?= $model[$i]['path_gambar'] ?>" alt="<?= $model[$i]['nama_event'] ?>">
	      <div class="caption">
	        <h4><?= $model[$i]['nama_event'] ?></h4>
	        <p><?= $model[$i]['jumlah_tiket'] ?> tickets</p>
	        <p><?= date("D, j F Y", strtotime($model[$i]['tgl_event'])) ?></p>
	        <p><?= date("g:i a", strtotime($model[$i]['waktu_event'])) ?></p>
            <p><?= $model[$i]['alamat'] ?></p> 
            <?php $id = $model[$i]['id'];?>
	        <p><a href="<?= Url::to(['tiket/preview', 'id' => $model[$i]['id']])?>" class="btn btn-success" role="button" >Detail Event</a></p>
	      </div>
	    </div>
	  </div>
	 <?php ActiveForm::end(); ?>
	 <?php } ?>
	</div>
</div>

