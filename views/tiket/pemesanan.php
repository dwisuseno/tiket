<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\url;
$this->title = "Pemesanan";
?>
<div class="site-index">
	<div class="row">
		<div class="col-md-5">
			<img style="height:200px" src="<?= $model['path_gambar'] ?>" alt="<?= $model['nama_event'] ?>">
		</div>
		<div class="col-md-7">
			<font size="6"><b><?= $model['nama_event'] ?></b></font><br>
			<font size="3"><b><?= $model['deskripsi'] ?> </b></font><br>
			<font size="3"><b><?= $model['jumlah_tiket'] ?> tickets</b></font><br>
			<font size="3"><b>Harga Tiket Pre-Sale: Rp<?php echo number_format($model['harga_ps'],2,",","."); ?></b></font><br>
			<font size="3"><b>Harga Tiket On The Spot: Rp<?php echo number_format($model['harga_ots'],2,",","."); ?></b></font><br>
			<!--<font size="4"><b>Date: <?= date("D, j F Y", strtotime($model['tgl_event'])) ?></b></font><br>
			<font size="3">Open Gate: <?= date("g:i a", strtotime($model['waktu_event'])) ?></font><br>
            <font size="3"><?= $model['alamat'] ?> </font><br> -->
            <!--<?php //$form = ActiveForm::begin([
				//'layout' => 'horizontal',
			    //'method' => 'post',
			    //'action' => ['tiket/pesantiket'],

			//]); ?>-->
			<?php $form = ActiveForm::begin(); ?>
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
					<?php 
					if(time() - strtotime($model['tgl_event']) <= 0)
					{
						//echo Html::submitButton('Pesan TIket Sekarang', ['class' => 'btn btn-success']); 
					?>
						<p><a class="btn btn-success" role="button" onclick="getConfirmation('<?php echo $model['id']?>');">Beli Tiket Sekarang</a></p>
					<?php	
					}
					?>
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
			    <h3 class="panel-title">Where & When</h3>
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
        <?php if(Yii::$app->user->identity != null) {?>
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
        <?php }?>
	</div>
    <?php if($model['gambar1'] != NULL || $model['gambar2'] != NULL || $model['gambar3'] != NULL) { ?>
    <div class="row">
        <?php if($model['gambar1'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar1'] ?>">
            </div>
        </div>
        <?php } ?>
        <?php if($model['gambar2'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar2'] ?>">
            </div>
        </div>
        <?php } ?>
        <?php if($model['gambar3'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar3'] ?>">
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <?php if($model['gambar4'] != NULL || $model['gambar5'] != NULL || $model['gambar6'] != NULL) { ?>
    <div class="row">
        <?php if($model['gambar4'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar4'] ?>">
            </div>
        </div>
        <?php } ?>
        <?php if($model['gambar5'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar5'] ?>">
            </div>
        </div>
        <?php } ?>
        <?php if($model['gambar6'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar6'] ?>">
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <?php if($model['gambar7'] != NULL || $model['gambar8'] != NULL || $model['gambar9'] != NULL) { ?>
    <div class="row">
        <?php if($model['gambar7'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar7'] ?>">
            </div>
        </div>
        <?php } ?>
        <?php if($model['gambar8'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar8'] ?>">
            </div>
        </div>
        <?php } ?>
        <?php if($model['gambar9'] != NULL) { ?>
        <div class="col-sm-12 col-md-4">
            <div class="thumbnail">
                <img style="height:200px" src="<?= $model['gambar9'] ?>">
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <br>
    <?php if(Yii::$app->user->identity != null) {?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Review</h3>
			  </div>
			  <div class="panel-body">
			    <?php $form = ActiveForm::begin([
				    'method' => 'post',
				    'action' => ['tiket/reviewsubmitted', 'id' => $model['id']],
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
				<div  class="table-responsive">          
				  <table id='test' class="table">
				    <thead>
				      <tr>
				        <th>No</th>
				        <th>Review</th>
				      </tr>
				    </thead>
				    <tbody>
				    <?php for($j=0;$j<sizeof($reviewContent);$j++){ ?>
				      <tr>
				        <td><?= $j+1 ?></td>
				        <td><?= $reviewContent[$j]['isi'] ?></td>
				      </tr>
				    <?php } ?>
				    </tbody>
				  </table>
				  </div>
			  </div>
			</div>
		</div>
	</div>
    <?php }?>
</div>
<script type="text/javascript">
function getConfirmation(id){
   var retVal = confirm("Do you want to continue ?");
   if( retVal == true ){
      window.location.href='http://localhost/tiket/web/index.php?r=tiket%2Fpesantiket&event_id='+id;
   }
}
</script>