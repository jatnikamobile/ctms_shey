
<?php
use app\models\Registrasi;
use app\models\Kop;
use app\components\Helper;
use yii\helpers\Html;

$kop = Kop::findOne(1);
?>
<table style="width: 100%" border="0" >
  <tr>
    <td>
      <table border="0" style="font-size: 8px; padding-top:-45px">
        <tr>
          <td rowspan="6">
          <?= Html::img(Yii::getAlias('@app').'/web/images/'.$kop->photo, [
                    'class' => 'img-responsive', 
                    'style' => 'height:60px'
                ]); ?>
          </td>
        <tr>
          <td><b><?= $kop->nama?></b></td>
        </tr>
        <tr>
          <td> <?= $kop->alamat?> </td>
        </tr>
        <tr>
          <td>Telepon : <?= $kop->telp?></td>
        </tr>
        <tr>
          <td>Email : <?= $kop->email?></td>
        </tr>
        <tr>
          <td>Website : <?= $kop->website?></td>
        </tr>
      </table>
    </td>
    <td>
      <table style="" border="0" style="font-size: 10px">
        <tr>
          <td>NIK / ID</td>
          <td>: <?= @$model->nik_pasien?></td>
        </tr>
        <tr>
          <td>No. ID Pasien</td>
          <td>: <?= @$model->no_mcu?></td>
        </tr>
        <tr>
          <td>No Urut / Tanggal Pemeriksaan</td>
          <td>: <?= @$model->no_urut.'/'.Helper::getTanggal(@$model->tanggal)?></td>
        </tr>
        <tr>
          <td>Nama Peserta</td>
          <td>: <?= @$model->nama_pasien?></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>: <?= @$model->jenis_kelamin_pasien?></td>
        </tr>
        <tr>
          <td>Rumah Sakit</td>
          <td>: <?= @$model->pasien->instansi->nama?></td>
        </tr>
        <tr>
          <td>Unit</td>
          <td>: <?= @$model->pasien->unit->nama?></td>
        </tr>
      </table>
    </td>
  </tr>
</table>