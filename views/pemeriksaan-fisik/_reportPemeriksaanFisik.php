<?php
    
use yii\helpers\Html;
use app\models\PemeriksaanFisik;
use app\components\Helper;
use app\models\Registrasi;

//echo $this->render('/site/_kop',['model' => $model]);
?>

</font>
<hr>
<h4 align="center" class="box-title"><u>PEMERIKSAAN FISIK</u></h4>
<table style="width:100%">
  <tr>
    <td width="160">Nadi</td>
    <td>: <?= $model->nadi; ?> /Menit</td>
    <td width="160">Suhu</td>
    <td>: <?= $model->suhu; ?> C</td>
  </tr>
  <tr>
    <td width="160">Pernafasan</td>
    <td>: <?= $model->pernafasan ; ?> /Menit</td>
    <td width="160">Berat Badan</td>
    <td>: <?= $model->berat_badan; ?> Kg</td>
  </tr>
  <tr>
    <td width="160">Tekanan Darah</td>
    <td>: <?= $model->sistolik . "/" .$model->diastolik ; ?> mmHg</td>
    <td width="160">Tinggi Badan</td>
    <td>: <?= $model->nadi; ?> Cm</td>
  </tr>
  <tr>
    <td width="160">Keluhan Utama</td>
    <td>: <?= $model->keluhan_utama ; ?></td>
    <td width="160">Riwayat Kesehatan Keluarga</td>
    <td>: <?= $model->riwayat_kesehatan_keluarga ; ?></td>
  </tr>
  <tr>
    <td width="160">Riwayat Alergi</td>
    <td>: <?= $model->riwayat_alergi ; ?></td>
    <td width="160">Kebiasaan</td>
    <td>: <?= $model->kebiasaan; ?></td>
  </tr>
  <tr>
    <td width="160">Riwayat Kesehatan Dahulu</td>
    <td>: <?= $model->riwayat_kesehatan_dulu ; ?></td>
  </tr>
</table>
<hr>
<table>
  <tr>
    <td><u><b>MATA</b></u></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>Kacamata</td>
    <td>: <?=@$model->pemeriksaanFisikMata->kacamata ; ?> </td>
  </tr>
  <tr>
    <td>Kelopak Mata</td>
    <td>: <?=@$model->pemeriksaanFisikMata->kelopak_mata ; ?> </td>
  </tr>
  <tr>
    <td>Konjungtiva</td>
    <td>: <?=@$model->pemeriksaanFisikMata->konjungtiva ; ?> </td>
  </tr>
  <tr>
    <td>Sklera</td>
    <td>: <?=@$model->pemeriksaanFisikMata->sklera ; ?> </td>
  </tr>
  <tr>
    <td>Pupil</td>
    <td>: <?=@$model->pemeriksaanFisikMata->pupil ; ?> </td>
  </tr>
  <tr>
    <td>Buta Warna</td>
    <td>: <?=@$model->pemeriksaanFisikMata->buta_warna ; ?> </td>
  </tr>
  <tr>
    <td>Refraksi</td>
    <td>: <?=@$model->pemeriksaanFisikMata->refraksi ; ?> </td>
  </tr>
  <tr>
    <td>Addisi</td>
    <td>: <?=@$model->pemeriksaanFisikMata->addisi ; ?> </td>
  </tr>
  <tr>
    <td>Funduskopi</td>
    <td>: <?=@$model->pemeriksaanFisikMata->funduskopi ; ?> </td>
  </tr>
  <tr>
    <td>Tekanan Bola</td>
    <td>: <?=@$model->pemeriksaanFisikMata->tekanan_bola ; ?> </td>
  </tr>
  <tr>
    <td>Mata Juling</td>
    <td>: <?=@$model->pemeriksaanFisikMata->mata_juling ; ?> </td>
  </tr>
  <tr>
    <td>Tonometri</td>
    <td>: <?=@$model->pemeriksaanFisikMata->tonometri ; ?> </td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><u><b>TELINGA</b></u></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>Bentuk Telinga</td>
    <td>: <?=@$model->pemeriksaanFisikTelinga->bentuk_telinga ; ?> </td>
  </tr>
  <tr>
    <td>Membrane</td>
    <td>: <?=@$model->pemeriksaanFisikTelinga->membrane ; ?> </td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><u><b>TIMPANI</b></u></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>Serumen</td>
    <td>: <?=@$model->pemeriksaanFisikTimpani->serumen ; ?> </td>
  </tr>
  <tr>
    <td>Lain - Lain</td>
    <td>: <?=@$model->pemeriksaanFisikTimpani->lainlain ; ?> </td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><u><b>HIDUNG</b></u></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>Bentuk Hidung</td>
    <td>: <?=@$model->pemeriksaanFisikHidung->bentuk_hidung ; ?> </td>
  </tr>
  <tr>
    <td>Septum Deviasi</td>
    <td>: <?=@$model->pemeriksaanFisikHidung->septum_deviasi ; ?> </td>
  </tr>
  <tr>
    <td>Conchae</td>
    <td>: <?=@$model->pemeriksaanFisikHidung->conchae ; ?> </td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><u><b>LEHER</b></u></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>Tiroid</td>
    <td>: <?=@$model->pemeriksaanFisikLeher->tiroid ; ?> </td>
  </tr>
  <tr>
    <td>Limfonoid</td>
    <td>: <?=@$model->pemeriksaanFisikLeher->limfonoid ; ?> </td>
  </tr>
  <tr>
    <td>Tenggorokan</td>
    <td>: <?=@$model->pemeriksaanFisikLeher->tenggorokan ; ?> </td>
  </tr>
  <tr>
    <td>Tonsil</td>
    <td>: <?=@$model->pemeriksaanFisikLeher->tonsil ; ?> </td>
  </tr>
  <tr>
    <td>Faring</td>
    <td>: <?=@$model->pemeriksaanFisikLeher->faring ; ?> </td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><u><b>MULUT</b></u></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>Mucosa Mulut</td>
    <td>: <?=@$model->pemeriksaanFisikMulut->mucosa_mulut ; ?> </td>
  </tr>
  <tr>
    <td>Kelainan Gigi</td>
    <td>: <?=@$model->pemeriksaanFisikMulut->kelainan_gigi ; ?> </td>
  </tr>
  <tr>
    <td>Lidah</td>
    <td>: <?=@$model->pemeriksaanFisikMulut->lidah ; ?> </td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><u><b>THORAX</b></u></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>Dinding</td>
    <td>: <?=@$model->pemeriksaanFisikThorax->dinding ; ?> </td>
  </tr>
  <tr>
    <td>Paru-Paru</td>
    <td>: <?=@$model->pemeriksaanFisikThorax->paru_paru ; ?> </td>
  </tr>
  <tr>
    <td>Jantung</td>
    <td>: <?=@$model->pemeriksaanFisikThorax->jantung ; ?> </td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><u><b>ABDOMEN</b></u></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>Dinding</td>
    <td>: <?=@$model->pemeriksaanFisikAbdomen->dinding ; ?> </td>
  </tr>
  <tr>
    <td>Hati</td>
    <td>: <?=@$model->pemeriksaanFisikAbdomen->hati ; ?> </td>
  </tr>
  <tr>
    <td>Limpa</td>
    <td>: <?=@$model->pemeriksaanFisikAbdomen->limpa ; ?> </td>
  </tr>
  <tr>
    <td>Usus</td>
    <td>: <?=@$model->pemeriksaanFisikAbdomen->usus ; ?> </td>
  </tr>
  <tr>
    <td>Hernia</td>
    <td>: <?=@$model->pemeriksaanFisikAbdomen->hernia ; ?> </td>
  </tr>
  <tr>
    <td>Scrotalis</td>
    <td>: <?=@$model->pemeriksaanFisikAbdomen->scrotalis ; ?> </td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><u><b>MANUFER EKSTREMITAS</b></u></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>Kekuatan</td>
    <td>: <?=@$model->pemeriksaanFisikManuferEkstremitas->kekuatan ; ?> </td>
  </tr>
  <tr>
    <td>Varises</td>
    <td>: <?=@$model->pemeriksaanFisikManuferEkstremitas->varises ; ?> </td>
  </tr>
  <tr>
    <td>Reflex Fisiologis</td>
    <td>: <?=@$model->pemeriksaanFisikManuferEkstremitas->reflek_fisiologis ; ?> </td>
  </tr>
  <tr>
    <td>Reflex Patologis</td>
    <td>: <?=@$model->pemeriksaanFisikManuferEkstremitas->reflek_patologis ; ?> </td>
  </tr>
  <tr>
    <td>Lain-lain</td>
    <td>: <?=@$model->pemeriksaanFisikManuferEkstremitas->lainlain ; ?> </td>
  </tr>
</table>
<table style="width:100%" border="0">
  <tr>
    <td width="400"  height="100"></td>
    <td> </td>
  </tr>
  <tr>
    <td width="400"></td>
    <td >Jakarta, ..........................</td>
  </tr>
  <tr>
    <td width="300"></td>
    <td >Dokter Pemeriksa</td>
  </tr>
  <tr>
    <td width="400" height="150" valign="bottom"></td>
    <td valign="bottom">(.................................)</td>
  </tr>
</table>
<!--<div style="page-break-after: always;"></div>-->