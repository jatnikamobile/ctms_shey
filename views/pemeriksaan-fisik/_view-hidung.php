<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$hidung = $model->findOrCreatePemeriksaanFisikHidung();
?>
    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Hidung</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Bentuk Hidung</th>
                <td width="80%">
                    <?= $hidung->bentuk_hidung; ?>
                </td>
            </tr>
            <tr>
                <th>Septum Deviasi</th>
                <td> 
                    <?= $hidung->septum_deviasi; ?>
                </td>
            </tr>
            <tr>
                <th>Conchae</th>
                <td> 
                    <?= $hidung->conchae; ?>
                </td>
            </tr>
        </table>
    </div>