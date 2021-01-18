<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$data = $model->findOrCreatePemeriksaanFisikThorax();
?>
    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Thorax</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Dinding</th>
                <td width="80%">
                    <?= $data->dinding; ?>
                </td>
            </tr>
            <tr>
                <th>Paru - Paru</th>
                <td> 
                    <?= $data->paru_paru; ?>
                </td>
            </tr>
            <tr>
                <th>Jantung</th>
                <td> 
                    <?= $data->jantung; ?>
                </td>
            </tr>
        </table>
    </div>