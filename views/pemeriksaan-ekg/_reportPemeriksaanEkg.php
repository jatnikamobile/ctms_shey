<?php
    
use yii\helpers\Html;
use app\models\PemeriksaanSpirometry;
use app\components\Helper;
use app\models\Registrasi;

echo $this->render('/site/_kop',['model' => $model]);
?>

<hr>
<h4 align="center" class="box-title"><u>PEMERIKSAAN EKG</u></h4>
<hr>

<table style="width:100%">
  <tr>
    <td width="160">Hasil</td>
    <td>: <?= $model->hasil; ?></td>
  </tr>
  <tr>
    <td width="160">Kesan</td>
    <td>: <?= $model->kesan; ?></td>
  </tr>
</table>