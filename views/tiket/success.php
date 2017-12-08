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
<?php }?>


