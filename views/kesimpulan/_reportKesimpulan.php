<?php
    
use yii\helpers\Html;
use app\models\Registrasi;
use app\components\Helper;

echo $this->render('/site/_kop',['model' => $model]);
$data = Registrasi::findOne([
  'id' => $model->id_registrasi
 ]);
?>

<hr>
<div class="kategori-index">
        <h4 align="center" class="box-title">HASIL PEMERIKSAAN</h4>
</div>
<hr>
<table style="width:100%">
  <tr>
    <td width="180">Riwayat Kesehatan Dulu</td>
    <td>: <?= @$data->pemeriksaanFisik->riwayat_kesehatan_dulu ; ?></td>
  </tr>
  <tr>
    <td width="180">Kebiasaan</td>
    <td>: <?= @$data->pemeriksaanFisik->kebiasaan ; ?></td>
  </tr>
  <tr>
    <td width="180">Tekanan Darah</td>
    <td>: <?= @$data->TekananDarah(@$data->pemeriksaanFisik->sistolik, @$data->pemeriksaanFisik->diastolik); ?></td>
  </tr>
  <tr>
    <td width="180">BMI</td>
    <td>: <?= $data->BodyMassIndex(@$data->pemeriksaanFisik->berat_badan, @$data->pemeriksaanFisik->tinggi_badan); ?> </td>
  </tr>
  <tr>
    <td width="180">Laboratorium</td>
    <td>: <?= @$data->dataLaboratorium->hasil_pemeriksaan ; ?></td>
  </tr>
  <tr>
    <td width="180">Radiolog</td>
    <td>: <?= @$data->radiologi->hasil_pemeriksaan ; ?></td>
  </tr>
</table>
<hr><width="100" height="75"></hr>
<table style="width:100%">
  <tr>
    <td width="180">Kesimpulan</td>
    <td>: <?= $model->isi_kesimpulan; ?></td>
  </tr>
  <tr>
    <td width="180">Saran</td>
    <td>: <?= $model->saran; ?></td>
  </tr>
  <tr>
    <td width="180">Diagnosa Kerja</td>
    <td>: <?= @$model->diagnosa->nama; ?></td>
  </tr>
</table>
<table style="width:100%">
  <tr>
    <td width="400"  height="100"></td>
    <td> </td>
  </tr>
  <tr>
    <td width="400"></td>
    <td >Jakarta, ..........................</td>
  </tr>
  <tr>
    <td width="400"></td>
    <td >Dokter Pemeriksa</td>
  </tr>
  <tr>
    <td width="400" height="300"></td>
    <td>(.................................)</td>
  </tr>
</table>