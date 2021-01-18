<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$mulut = $model->findOrCreatePemeriksaanFisikMulut();
?>
    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Mulut</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Mucosa Mulut</th>
                <td width="80%">
                    <?= $mulut->mucosa_mulut; ?>
                </td>
            </tr>
            <tr>
                <th>Kelainan Gigi</th>
                <td> 
                    <?= $mulut->kelainan_gigi; ?>
                </td>
            </tr>
            <tr>
                <th>Lidah</th>
                <td> 
                    <?= $mulut->lidah; ?>
                </td>
            </tr>
        </table>
    </div>