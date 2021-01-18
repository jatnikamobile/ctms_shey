<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */

$data = $model->findOrCreatePemeriksaanUsg();

?>
    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan USG</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Hati</th>
                <td width="80%">
                    <?= $data->hati ; ?>
                </td>
            </tr>
            <tr>
                <th>K.G.B</th>
                <td>
                    <?= $data->kgb ; ?>
                </td>
            </tr>
            <tr>
                <th>K.Empedu</th>
                <td>
                    <?= $data->empedu ; ?>
                </td>
            </tr>
            <tr>
                <th>Limpa</th>
                <td>
                    <?= $data->limpa ; ?>
                </td>
            </tr>
            <tr>
                <th>Pankreas</th>
                <td>
                    <?= $data->pankreas ; ?>
                </td>
            </tr>
            <tr>
                <th>Ginjal</th>
                <td>
                    <?= $data->ginjal ; ?>
                </td>
            </tr>
            <tr>
                <th>K.Kemih</th>
                <td>
                    <?= $data->kemih ; ?>
                </td>
            </tr>
            <tr>
                <th>Lain-lain</th>
                <td>
                    <?= $data->lainlain ; ?>
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
            <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan USG', ['/pemeriksaan-usg/update', 'id' => $data->id], ['class' => 'btn btn-success btn-flat']) ?>
            <?= Html::a('<i class="fa fa-print"></i> Export Pemeriksaan USG to PDF', ['/pemeriksaan-usg/pdf/', 'id' => $data->id  ], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php endif ?>
    </div>