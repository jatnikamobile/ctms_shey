<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$telinga = $model->findOrCreatePemeriksaanFisikTelinga();
?>
    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Telinga</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Bentuk Telinga</th>
                <td width="80%">
                    <?= $telinga->bentuk_telinga; ?>
                </td>
            </tr>
            <tr>
                <th>Membrane</th>
                <td> 
                    <?= $telinga->membrane; ?>
                </td>
            </tr>
        </table>
    </div>