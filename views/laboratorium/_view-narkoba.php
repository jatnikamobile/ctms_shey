<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$data = $model->findOrCreateLaboratoriumNarkoba();
?>
    <div class="box-header">
        <h3 class="box-title">Detail Laboratorium Pemeriksaan Narkoba
        </h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Pemeriksaan Methampheta-mine (MET)</th>
                <td width="80%">
                    <?= $data->methamphetamine; ?>
                </td>
            </tr>
            <tr>
                <th>Pemeriksaan Cocain (COC)</th>
                <td>
                    <?= $data->cocain; ?>
                </td>
            </tr>
            <tr>
                <th>Pemeriksaan Amphetamine (AMP)</th>
                <td>
                    <?= $data->amphetamine; ?>
                </td>
            </tr>
            <tr>
                <th>Pemeriksaan Morphine (MOP)</th>
                <td>
                    <?= $data->amphetamine; ?>
                </td>
            </tr>
            <tr>
                <th>Pemeriksaan Mariyuana (THC)</th>
                <td>
                    <?= $data->amphetamine; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Narkoba', ['/laboratorium-narkoba/update', 'id' => $data->id], ['class' => 'btn btn-success btn-flat']) ?>
    </div>