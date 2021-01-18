<?php
    
use yii\helpers\Html;
use app\models\PemeriksaanSpirometry;
use app\components\Helper;
use app\models\Registrasi;

echo $this->render('/site/_kop',['model' => $model]);
?>

<hr>
<h4 align="center" class="box-title"><u>PEMERIKSAAN USG</u></h4>
<hr>

<table style="width:100%">
  <tr>
    <td width="160">Hati</td>
    <td>: <?= $model->hati; ?></td>
  </tr>
  <tr>
    <td width="160">K.G.B</td>
    <td>: <?= $model->kgb; ?></td>
  </tr>
  <tr>
    <td width="160">Empedu</td>
    <td>: <?= $model->empedu; ?></td>
  </tr>
  <tr>
    <td width="160">Limpa</td>
    <td>: <?= $model->limpa; ?></td>
  </tr>
  <tr>
    <td width="160">Pankreas</td>
    <td>: <?= $model->pankreas; ?></td>
  </tr>
  <tr>
    <td width="160">Ginjal</td>
    <td>: <?= $model->ginjal; ?></td>
  </tr>
  <tr>
    <td width="160">Kemih</td>
    <td>: <?= $model->kemih; ?></td>
  </tr>
  <tr>
    <td width="160">Lain-lain</td>
    <td>: <?= $model->lainlain; ?></td>
  </tr>
  <tr>
    <td width="160">Kesimpulan</td>
    <td>: <?= $model->kesimpulan; ?></td>
  </tr>
</table>