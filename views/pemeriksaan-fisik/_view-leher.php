<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$leher = $model->findOrCreatePemeriksaanFisikLeher();
?>
    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Leher</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Tiroid</th>
                <td width="80%">
                    <?= $leher->tiroid; ?>
                </td>
            </tr>
            <tr>
                <th>Limfonoid</th>
                <td> 
                    <?= $leher->limfonoid; ?>
                </td>
            </tr>
            <tr>
                <th>Tenggorokan</th>
                <td> 
                    <?= $leher->tenggorokan; ?>
                </td>
            </tr>
            <tr>
                <th>Tonsil</th>
                <td> 
                    <?= $leher->tonsil; ?>
                </td>
            </tr>
            <tr>
                <th>Faring</th>
                <td> 
                    <?= $leher->faring; ?>
                </td>
            </tr>
        </table>
    </div>