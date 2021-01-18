<?php
    
use yii\helpers\Html;
use app\models\PemeriksaanSpirometry;
use app\components\Helper;
use app\models\Registrasi;

echo $this->render('/site/_kop',['model' => $model]);
?>

<hr>
<h4 align="center" class="box-title"><u>PEMERIKSAAN AUDIOMETRY</u></h4>
<hr>

<table style="width:100%">
  <tr>
    <td width="160">L1000</td>
    <td>: <?= $model->l1000; ?></td>
  </tr>
  <tr>
    <td width="160">L4000</td>
    <td>: <?= $model->l4000; ?></td>
  </tr>
  <tr>
    <td width="160">R1000</td>
    <td>: <?= $model->r1000; ?></td>
  </tr>
  <tr>
    <td width="160">R4000</td>
    <td>: <?= $model->r4000; ?></td>
  </tr>
  <tr>
    <td width="160">Selisih</td>
    <td>: <?= $model->selisih; ?></td>
  </tr>
  <tr>
    <td width="160">NIH</td>
    <td>: <?= $model->nih; ?></td>
  </tr>
  <tr>
    <td width="160">Uraian</td>
    <td>: <?= $model->uraian; ?></td>
  </tr>
  <tr>
    <td width="160">Kesimpulan</td>
    <td>: <?= $model->kesimpulan; ?></td>
  </tr>
</table>