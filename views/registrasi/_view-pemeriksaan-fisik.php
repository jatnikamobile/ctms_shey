<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */

$fisik = $model->findOrCreatePemeriksaanFisik();

?>
    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik</h3>
    </div>



    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Keluhan Utama</th>
                <td width="80%">
                    <?= $fisik->keluhan_utama ; ?>
                </td>
            </tr>
            <tr>
                <th>Riwayat Alergi</th>
                <td>
                    <?= $fisik->riwayat_alergi ; ?>
                </td>
            </tr>
            <tr>
                <th>Riwayat Kesehatan Dulu</th>
                <td> 
                    <?= $fisik->riwayat_kesehatan_dulu ; ?>
                </td>
            </tr>
            <tr>
                <th>Riwayat Kesehatan Keluarga</th>
                <td>
                    <?= $fisik->riwayat_kesehatan_keluarga ; ?>
                </td>
            </tr>
            <tr>
                <th>Kebiasaan</th>
                <td>
                    <?= $fisik->kebiasaan ; ?>
                </td>
            </tr>
            <tr>
                <th>Tekanan Darah</th>
                <td>
                    <?= $fisik->sistolik .'/'. $fisik->diastolik .' MM/Hg' ; ?> <?= $model->TekananDarah($fisik->sistolik, $fisik->diastolik) ; ?>
                </td>
            </tr>
            <tr>
                <th>Tinggi Badan</th>
                <td>
                    <?= $fisik->tinggi_badan .' Cm' ; ?>
                </td>
            </tr>
            <tr>
                <th>Berat Badan</th>
                <td>
                    <?= $fisik->berat_badan .' Kg' ; ?>
                </td>
            </tr>
            <tr>
                <th>BMI</th>
                <td>
                    <?= $model->BodyMassIndex($fisik->berat_badan, $fisik->tinggi_badan); ?>
                </td>
            </tr>
            <tr>
                <th>Golongan Darah</th>
                <td>
                    <?= $fisik->golongan_darah ; ?>
                </td>
            </tr>
            <tr>
                <th>Buta Warna</th>
                <td>
                    <?= $fisik->buta_warna ; ?>
                </td>
            </tr>
            <tr>
                <th>Anamnesa</th>
                <td>
                    <?= $fisik->anamnesa ; ?>
                </td>
            </tr>
        </table>
    </div>

    <div class="box-body">
        <?php if ($buttonAction): ?>
            <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Fisik', ['/pemeriksaan-fisik/update', 'id' => $fisik->id], ['class' => 'btn btn-success btn-flat']) ?>
            <?php // Html::a('<i class="fa fa-mail-forward"></i> Detail Pemeriksaan Fisik', ['/pemeriksaan-fisik/view/', 'id' => $fisik->id  ], ['class' => 'btn btn-warning btn-flat']) ?>
            <?= Html::a('<i class="fa fa-print"></i> Export Pemeriksaan Fisik to PDF', ['/pemeriksaan-fisik/pdf/', 'id' => $fisik->id  ], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php endif ?>
    </div>

    <div class="box-body">
        <?= $this->render('//pemeriksaan-fisik/_view-tab',[
            'model' => $model->findOrCreatePemeriksaanFisik()
        ]); ?>
    </div>

