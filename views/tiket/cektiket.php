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

	<table id='test' class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Kode Pembayaran</th>
        <th>Kode Tiket</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    	<?php for($i=0;$i<sizeof($model);$i++){ ?>
      <tr>
        <td><?= $i+1 ?></td>
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
      </tr>
      <?php } ?>
    </tbody>
  </table>
  
</div>