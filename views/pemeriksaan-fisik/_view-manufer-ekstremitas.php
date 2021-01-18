<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$data = $model->findOrCreatePemeriksaanFisikManuferEkstremitas();
?>
    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Manufer Ekstremitas</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Kekuatan</th>
                <td width="80%">
                    <?= $data->kekuatan; ?>
                </td>
            </tr>
            <tr>
                <th>Varises</th>
                <td> 
                    <?= $data->varises; ?>
                </td>
            </tr>
            <tr>
                <th>Reflex Fisiologis</th>
                <td> 
                    <?= $data->reflek_fisiologis; ?>
                </td>
            </tr>
            <tr>
                <th>Reflex Patologis</th>
                <td> 
                    <?= $data->reflek_patologis; ?>
                </td>
            </tr>
            <tr>
                <th>Lain - Lain</th>
                <td> 
                    <?= $data->lainlain; ?>
                </td>
            </tr>
        </table>
    </div>