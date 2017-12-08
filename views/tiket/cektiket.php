<?php
/* @var $this yii\web\View */
/* @var $searchModel app\models\TiketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
$this->title = 'Tiket';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiket-index">
<div class="alert alert-info" role="alert">
	<table id='test' class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Event</th>
        <th>Tanggal Event</th>
        <th>Kode Pembayaran</th>
        <th>Kode Tiket</th>
        <th>Status</th>
        <th>Harga Tiket</th>
        <th>Tanggal Pembelian</th>
      </tr>
    </thead>
    <tbody>
    	<?php for($i=0;$i<sizeof($model);$i++){ ?>
      <tr>
        <td><?= $i+1 ?></td>
        <td><?php echo $model[$i]['nama_event'];?>
        </td>
        <td><?php echo Yii::$app->formatter->asDate($model[$i]['tgl_event'], 'dd-MM-yyyy');?>
        </td>
        <td><?php echo $model[$i]['kode_pembayaran'];?>
          </td>
          <td><?php if($model[$i]['status'] == '0'){ 
          echo 'Silahkan melakukan pembayaran'; }
          else {
          echo $model[$i]['kode_tiket'];
        }?>
        </td>
        <td><?php if($model[$i]['status'] == '0'){ 
          echo "Belum Dibayar"; }
          else {
          echo "Sudah Dibayar | ";
          echo "<a target='_blank' href='index.php?r=tiket/cetaktiket&id=".$model[$i]['id']."'>Cetak Tiket</a>";
        }?></td>
        <td>Rp<?php echo number_format($model[$i]['harga'],2,",","."); ?>
        </td>
        <td>
          <?php echo Yii::$app->formatter->asDate($model[$i]['created_at'], 'dd-MM-yyyy');?>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
</div>