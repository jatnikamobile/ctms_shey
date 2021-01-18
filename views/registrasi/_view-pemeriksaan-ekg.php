<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */

$data = $model->findOrCreatePemeriksaanEkg();

?>
    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan EKG</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Hasil</th>
                <td width="80%">
                    <?= $data->hasil ; ?>
                </td>
            </tr>
            <tr>
                <th>Kesan</th>
                <td>
                    <?= $data->kesan ; ?>
                </td>
            </tr>
        </table>
    </div>

    <div class="box-body">
        <?php if ($buttonAction): ?>
            <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan EKG', ['/pemeriksaan-ekg/update', 'id' => $data->id], ['class' => 'btn btn-success btn-flat']) ?>
            <?= Html::a('<i class="fa fa-print"></i> Export Pemeriksaan EKG to PDF', ['/pemeriksaan-ekg/pdf/', 'id' => $data->id  ], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php endif ?>
    </div>