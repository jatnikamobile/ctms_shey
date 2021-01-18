<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */

$data = $model->findOrCreatePemeriksaanAudiometry();

?>
    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Audiometry</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">L1000</th>
                <td width="80%">
                    <?= $data->l1000 ; ?>
                </td>
            </tr>
            <tr>
                <th>L4000</th>
                <td>
                    <?= $data->l4000 ; ?>
                </td>
            </tr>
            <tr>
                <th>R1000</th>
                <td>
                    <?= $data->r1000 ; ?>
                </td>
            </tr>
            <tr>
                <th>R4000</th>
                <td>
                    <?= $data->r4000 ; ?>
                </td>
            </tr>
            <tr>
                <th>Selisih</th>
                <td>
                    <?= $data->selisih ; ?>
                </td>
            </tr>
            <tr>
                <th>NIH</th>
                <td>
                    <?= $data->nih ; ?>
                </td>
            </tr>
            <tr>
                <th>Uraian</th>
                <td>
                    <?= $data->uraian ; ?>
                </td>
            </tr>
            <tr>
                <th>Kesimpulan</th>
                <td>
                    <?= $data->kesimpulan ; ?>
                </td>
            </tr>
        </table>
    </div>

    <div class="box-body">
        <?php if ($buttonAction): ?>
            <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Audiometry', ['/pemeriksaan-audiometry/update', 'id' => $data->id], ['class' => 'btn btn-success btn-flat']) ?>
            <?= Html::a('<i class="fa fa-print"></i> Export Pemeriksaan Audiometry to PDF', ['/pemeriksaan-audiometry/pdf/', 'id' => $data->id  ], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php endif ?>
    </div>