<?php
    
use yii\helpers\Html;
use app\models\Registrasi;
use app\models\KOP;
use app\components\Helper;

$kop = KOP::findOne(1);
?>
<table style="width: 100%" border="0" >
  <tr>
    <td>
     <?php echo $this->render('/site/_kop-registrasi',['model' => $model]); ?>
    </td>
    <td>
    <table style="" border="0" style="font-size: 10px">
        <tr>
          <td>NIK/ID</td>
          <td>: <?= @$model->nik_pasien?></td>
        </tr>
        <tr>
          <td>No. ID Pemeriksaan</td>
          <td>: <?= @$model->no_mcu?></td>
        </tr>
        <tr>
          <td>No Urut/Tanggal Pemeriksaan</td>
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
          <td>Unit Pelaksana</td>
          <td>: <?= @$model->pasien->unit->nama?></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<hr>
<div class="kategori-index">
    <h3 align="center" class="box-title"><u>Formulir Test SWAB</u></h3>
</div>
<br>
<font size="3" face="tahoma">
<table style="width:100%">
  <tr>
    <td width="160">Nama</td>
    <td>: <?= @$model->pasien->nama; ?></td>
    <td width="160">No. ID Pemeriksaan</td>
    <td>: <?= $model->no_mcu; ?></td>
  </tr>
  <tr>
    <td width="160">Unit</td>
    <td>: <?= @$model->pasien->instansi->nama . ' - ' . @$model->pasien->unit->nama; ?></td>
    <td width="160">Tanggal Lahir</td>
    <td>: <?= Helper::getTanggal($model->pasien->tanggal_lahir) ?></td>
  </tr>
  <tr>
    <td width="160">NIK</td>
    <td>: <?= @$model->pasien->nik; ?></td>
    <td width="160">Jenis Kelamin</td>
    <td>: <?= @$model->pasien->jenis_kelamin; ?></td>
  </tr>
  <tr>
    <td width="160">Nama Pemeriksaan</td>
    <td>: <?= @$model->paket->nama; ?> </td>
    <td width="80"></td>
    <td></td>
  </tr>
</table>
</font>
<hr><width="100" height="75"></hr>
<table style="width:100%" border="1">
  <tr>
    <th>Fisik</th>
    <th>Darah</th> 
    <th>Urin</th>
    <th>Rontgen</th>
  </tr>
  <tr>
    <th width="80" height="140"> </th>
    <th width="80" height="140"> </th> 
    <th width="80" height="140"> </th>
    <th width="80" height="140"> </th>
  </tr>
</table>