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
	      <img style="height:200px" src="<?= $model[$i]['path_gambar'] ?>?cache=<?php echo time(); ?>" alt="<?= $model[$i]['nama_event'] ?>">
	      <div class="caption">
	        <h4><?= $model[$i]['nama_event'] ?></h4>
	        <p><?= $model[$i]['jumlah_tiket'] ?> tickets</p>
	        <p><?= date("D, j F Y", strtotime($model[$i]['tgl_event'])) ?></p>
	        <p><?= date("g:i a", strtotime($model[$i]['waktu_event'])) ?></p>
            <p><?= $model[$i]['alamat'] ?></p> 
            <?php if(Yii::$app->user->identity != null){?>
            <?php $id = $model[$i]['id'];?>
	        <p><a href="<?= Url::to(['tiket/preview', 'id' => $model[$i]['id']])?>" class="btn btn-success" role="button" >Detail Event</a></p>
			<?php
				if(time() - strtotime($model[$i]['tgl_event']) <= 0)
				{ 
				?>
					<p><a class="btn btn-primary" role="button" onclick="getConfirmation('<?php echo $model[$i]['id']?>');">Beli Tiket</a></p>
				<?php
				}
			}?>
	      </div>
	    </div>
	  </div>
	 <?php ActiveForm::end(); ?>
	 <?php } ?>
	</div>
</div>
<script type="text/javascript">
function getConfirmation(id){
	var retVal = confirm("Do you want to continue ?");
	if( retVal == true ){
	  window.location.href='http://localhost/tiket/web/index.php?r=tiket%2Fpesantiketlangsung&event_id='+id;
	}
}
</script>

