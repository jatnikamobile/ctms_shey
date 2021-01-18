<?php
    
use yii\helpers\Html;
use app\models\PemeriksaanSpirometry;
use app\components\Helper;
use app\models\Registrasi;

echo $this->render('/site/_kop',['model' => $model]);
?>

<hr>
<h4 align="center" class="box-title"><u>PEMERIKSAAN TREADMILL</u></h4>
<hr>

<table style="width:100%">
  <tr>
    <td width="180">Metode</td>
    <td>: <?= $model->metode; ?></td>
  </tr>
  <tr>
    <td width="180">Jantung</td>
    <td>: <?= $model->jantung; ?></td>
  </tr>
  <tr>
    <td width="180">Klasifikasi Fitness Poor</td>
    <td>: <?= $model->kf_poor; ?> mets</td>
  </tr>
  <tr>
    <td width="180">Klasifikasi Fitness Fair</td>
    <td>: <?= $model->kf_fair; ?> mets</td>
  </tr>
  <tr>
    <td width="180">Klasifikasi Fitness Average</td>
    <td>: <?= $model->kf_average; ?> mets</td>
  </tr>
  <tr>
    <td width="180">Klasifikasi Fitness Good</td>
    <td>: <?= $model->kf_good; ?> mets</td>
  </tr>
  <tr>
    <td width="180">Klasifikasi Fitness Excelent</td>
    <td>: <?= $model->kf_excelent; ?> mets</td>
  </tr>
  <tr>
    <td width="180">Klasifikasi Fungsional 1</td>
    <td>: <?= $model->klasifikasi_fungsional_1; ?></td>
  </tr>
  <tr>
    <td width="180">Klasifikasi Fungsional 2</td>
    <td>: <?= $model->klasifikasi_fungsional_2; ?></td>
  </tr>
  <tr>
    <td width="180">Klasifikasi Fungsional 3</td>
    <td>: <?= $model->klasifikasi_fungsional_3; ?></td>
  </tr>
  <tr>
    <td width="180">Denyut Nadi Awal</td>
    <td>: <?= $model->denyut_nadi_awal; ?></td>
  </tr>
  <tr>
    <td width="180">Denyut Nadi Akhir</td>
    <td>: <?= $model->denyut_nadi_akhir; ?></td>
  </tr>
  <tr>
    <td width="180">Tekanan Darah Awal</td>
    <td>: <?= $model->td_sistolik_awal. '/' . $model->td_diastolik_awal . ' mmHg';?></td>
  </tr>
  <tr>
    <td width="180">Tekanan Darah Akhir</td>
    <td>: <?= $model->td_sistolik_akhir. '/' . $model->td_diastolik_akhir . ' mmHg';?></td>
  </tr>
  <tr>
    <td width="180">MAX</td>
    <td>: <?= $model->max;?> HR</td>
  </tr>
  <tr>
    <td width="180">SUBMAX</td>
    <td>: <?= $model->submax;?> HR</td>
  </tr>
  <tr>
    <td width="180">Stop Treadmill</td>
    <td>: <?= $model->stop_treadmill;?></td>
  </tr>
  <tr>
    <td width="180">Resume Hasil</td>
    <td>: <?= $model->resume_hasil;?></td>
  </tr>
</table>