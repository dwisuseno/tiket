<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\url;

$this->title = "Success";

?>
<?php if(Yii::$app->session->getFlash('warning')){ ?>
<div class="alert alert-success">
  <strong>Success!</strong> <?= Yii::$app->session->getFlash('warning'); ?>.
</div>
<?php }?>
