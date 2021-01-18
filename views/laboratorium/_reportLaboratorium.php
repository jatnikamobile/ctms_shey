<?php
    
use yii\helpers\Html;
use app\models\PemeriksaanFisik;
use app\components\Helper;
use app\models\Registrasi;

//echo $this->render('/site/_kop',['model' => $model]);
?>
<hr>
<h4 align="center" class="box-title"><u>HASIL PEMERIKSAAN LABORATORIUM</u></h4>
<hr>
<table width="100%">
  <tr>
    <td width="40%"><b>Nama Pemeriksaan</b></td>
    <td width="10%"><b>Hasil</b></td>
    <td width="40%"><b>Nilai Rujukan</b></td>
  </tr>
</table>
<hr>
<table width="100%" border="0">
  <tr>
    <td><b>HEMATOLOGI</b></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;DARAH LENGKAP</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hemoglobin</td>
    <td width="10%"><?=@$model->laboratoriumHematologi->hemoglobin ; ?> </td>
    <td width="10%">gr/dl</td>
    <td width="40%">P 13,2 - 17,3 W 11,7 - 15,5 gr/dl</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lekosit</td>
    <td width="10%"><?=@$model->laboratoriumHematologi->lekosit ; ?> </td>
    <td width="10%">mm3</td>
    <td width="40%">P: 3800 - 10600 W: 3600 - 11000/mm3</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hematokrit</td>
    <td width="10%"><?=@$model->laboratoriumHematologi->hematokrit ; ?> </td>
    <td width="10%">%</td>
    <td width="40%">P: 40 - 52% W: 35 - 47%</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trombosit</td>
    <td width="10%"><?=@$model->laboratoriumHematologi->trombosit ; ?> </td>
    <td width="10%">mm3</td>
    <td width="40%">150 - 440 ribu/mm3</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eritrosit</td>
    <td width="10%"><?=@$model->laboratoriumHematologi->eritrosit ; ?> </td>
    <td width="10%">mm3</td>
    <td width="40%">P: 4,5 - 5,5 juta/mm3 W: 4,0 - 5,2 juta/mm3</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;HITUNG JENIS</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Basofil</td>
    <td width="10%"><?=@$model->laboratoriumHematologi->hj_basofil ; ?> </td>
    <td width="10%">%</td>
    <td width="40%">0 - 1%</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eosinofil</td>
    <td width="10%"><?=@$model->laboratoriumHematologi->hj_eosinofil ; ?> </td>
    <td width="10%">%</td>
    <td width="40%">2 - 4%</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Neutrofil Batang</td>
    <td width="10%"><?=@$model->laboratoriumHematologi->hj_neutrofil_batang ; ?> </td>
    <td width="10%">%</td>
    <td width="40%">3 - 5%</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Neutrofil Segment</td>
    <td width="10%"><?=@$model->laboratoriumHematologi->hj_neutrofil_segment ; ?> </td>
    <td width="10%">%</td>
    <td width="40%">50 - 70%</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Limfosit</td>
    <td width="10%"><?=@$model->laboratoriumHematologi->hj_limfosit ; ?> </td>
    <td width="10%">%</td>
    <td width="40%">25 - 40%</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monosit</td>
    <td width="10%"><?=@$model->laboratoriumHematologi->hj_monosit ; ?> </td>
    <td width="10%">%</td>
    <td width="40%">2 - 8%</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LED</td>
    <td width="10%"><?=@$model->laboratoriumHematologi->led ; ?> </td>
    <td width="10%">%</td>
    <td width="40%">P: < 15, W < 20 mm/jam</td>
  </tr>
  <tr>
    <td><b>KIMIA</b></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Faal Hati</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SGOT</td>
    <td width="10%"><?=@$model->laboratoriumKimia->faal_hati_sgot ; ?> </td>
    <td width="10%">u/l</td>
    <td width="40%">P: 10-50 u/l W: 10-35 u/l</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SGPT</td>
    <td width="10%"><?=@$model->laboratoriumKimia->faal_hati_sgpt ; ?> </td>
    <td width="10%">u/l</td>
    <td width="40%">P: 10-50 u/l W: 10-35 u/l</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Profil Lemak</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kolesterol Total</td>
    <td width="10%"><?=@$model->laboratoriumKimia->lemak_kolesterol_total ; ?> </td>
    <td width="10%">mg/dL</td>
    <td width="40%">< 200 mg/dl</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trigliserida</td>
    <td width="10%"><?=@$model->laboratoriumKimia->lemak_trigliserida ; ?> </td>
    <td width="10%">mg/dL</td>
    <td width="40%">< 200 mg/dl</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kolesterol HDL</td>
    <td width="10%"><?=@$model->laboratoriumKimia->lemak_kolesterol_hdl ; ?> </td>
    <td width="10%">mg/dL</td>
    <td width="40%">> 35 mg/dl</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kolesterol LDL</td>
    <td width="10%"><?=@$model->laboratoriumKimia->lemak_kolesterol_ldl ; ?> </td>
    <td width="10%">mg/dL</td>
    <td width="40%">< 140 mg/dl</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;Diabetes</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Glukosa Puasa</td>
    <td width="10%"><?=@$model->laboratoriumKimia->diabetes_glukosa_puasa ; ?> </td>
    <td width="10%">mg/dL</td>
    <td width="40%">80 - 100 mg/dl</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Glukosa 2 Jam PP</td>
    <td width="10%"><?=@$model->laboratoriumKimia->diabetes_glukosa_2_jam ; ?> </td>
    <td width="10%">mg/dL</td>
    <td width="40%">< 120 mg/dl</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gamma GT</td>
    <td width="10%"><?=@$model->laboratoriumKimia->diabetes_gamma_gt ; ?> </td>
    <td width="10%">u/l</td>
    <td width="40%">5-38 u/l</td>
  </tr>
  <tr>
    <td><b>URINALISA</b></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;URIN LENGKAP</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PH</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->ph ; ?> </td>
    <td width="10%"></td>
    <td width="40%">5.0 - 6.0</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berat Jenis</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->berat_jenis ; ?> </td>
    <td width="10%"></td>
    <td width="40%">1000 - 1300</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Protein</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->protein ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reduksi</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->reduksi ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bilirubin</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->bilirubin ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Urobilinogen</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->urobilinogen ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Positif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nitrit</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->nitrit ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keton</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->keton ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Darah</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->darah ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mikroskopis</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Leukosit</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->mk_leukosit ; ?> </td>
    <td width="10%">/LPB</td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eritrosit</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->mk_eritrosit ; ?> </td>
    <td width="10%">/LPB</td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Silender</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->mk_silender ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ephitel</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->mk_epithel ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kristal</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->mk_kristal ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lain-Lain</td>
    <td width="10%"><?=@$model->laboratoriumUrinalisa->mk_lainlain ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;PEMERIKSAAN NARKOBA</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Methampheta-mine (MET)</td>
    <td width="10%"><?=@$model->laboratoriumNarkoba->methamphetamine ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cocaine (COC)</td>
    <td width="10%"><?=@$model->laboratoriumNarkoba->cocain ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amphetamine (AMP)</td>
    <td width="10%"><?=@$model->laboratoriumNarkoba->amphetamine ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Morphine (MOP)</td>
    <td width="10%"><?=@$model->laboratoriumNarkoba->morphine ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mariyuana (THC)</td>
    <td width="10%"><?=@$model->laboratoriumNarkoba->mariyuana ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Negatif</td>
  </tr>
  <tr>
    <td> </td>  
  </tr>
  <tr>
    <td><b>IMUNOSEROLOGI</b></td>
  </tr>
  <tr>
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;Hbs Ag</td>
    <td width="10%"><?=@$model->laboratoriumImunoserologi->hbs_ag ; ?> </td>
    <td width="10%"></td>
    <td width="40%">Non Reaktif</td>
  </tr>
</table>