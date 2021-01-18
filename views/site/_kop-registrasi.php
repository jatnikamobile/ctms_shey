
<?php
use app\models\Registrasi;
use app\models\Kop;
use app\components\Helper;
use yii\helpers\Html;

$kop = Kop::findOne(1);
?>
<table style="width: 100%; padding-top:-35px;" border="0" >
  <tr>
    <td>
      <table style="" border="0" style="font-size: 8px">
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
  </tr>
</table>