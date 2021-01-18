
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$timpani = $model->findOrCreatePemeriksaanFisikTimpani();
?>
    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Timpani</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Serumen</th>
                <td width="80%">
                    <?= $timpani->serumen; ?>
                </td>
            </tr>
            <tr>
                <th>Lain-Lain</th>
                <td> 
                    <?= $timpani->lainlain; ?>
                </td>
            </tr>
        </table>
    </div>