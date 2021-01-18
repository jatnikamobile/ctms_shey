<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */

$data = $model->findOrCreatePemeriksaanTreadmill();

?>
    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Treadmill</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="23%">Metode</th>
                <td width="77%">
                    <?= $data->metode ; ?>
                </td>
            </tr>
            <tr>
                <th>Jantung</th>
                <td>
                    <?= $data->jantung ; ?>
                </td>
            </tr>
            <tr>
                <th>Klasifikasi Fitness Poor</th>
                <td>
                    <?= $data->kf_poor . 'mets' ; ?> 
                </td>
            </tr>
            <tr>
                <th>Klasifikasi Fitness Fair</th>
                <td>
                    <?= $data->kf_fair .'mets' ; ?>
                </td>
            </tr>
            <tr>
                <th>Klasifikasi Fitness Average</th>
                <td>
                    <?= $data->kf_average . 'mets' ; ?>
                </td>
            </tr>
            <tr>
                <th>Klasifikasi Fitness Good</th>
                <td>
                    <?= $data->kf_good . 'mets' ; ?>
                </td>
            </tr>
            <tr>
                <th>Klasifikasi Fitness Excelent</th>
                <td>
                    <?= $data->kf_excelent . 'mets' ; ?>
                </td>
            </tr>
            <tr>
                <th>Klasifikasi Fungsionalitas 1</th>
                <td>
                    <?= $data->klasifikasi_fungsional_1 ; ?>
                </td>
            </tr>
            <tr>
                <th>Klasifikasi Fungsionalitas 2</th>
                <td>
                    <?= $data->klasifikasi_fungsional_2 ; ?>
                </td>
            </tr>
            <tr>
                <th>Klasifikasi Fungsionalitas 3</th>
                <td>
                    <?= $data->klasifikasi_fungsional_3 ; ?>
                </td>
            </tr>
            <tr>
                <th>Denyut Nadi Awal</th>
                <td>
                    <?= $data->denyut_nadi_awal; ?>
                </td>
            </tr>
            <tr>
                <th>Denyut Nadi Akhir</th>
                <td>
                    <?= $data->denyut_nadi_akhir; ?>
                </td>
            </tr>
            <tr>
                <th>Tekanan Darah Awal</th>
                <td>
                    <?= $data->td_sistolik_awal .'/'. $data->td_diastolik_awal .' MM/Hg' ; ?>
                </td>
            </tr>
            <tr>
                <th>Tekanan Darah Akhir</th>
                <td>
                    <?= $data->td_sistolik_akhir .'/'. $data->td_diastolik_akhir .' MM/Hg' ; ?>
                </td>
            </tr>
            <tr>
                <th>Max</th>
                <td>
                    <?= $data->max . 'HR'; ?>
                </td>
            </tr>
            <tr>
                <th>Submax</th>
                <td>
                    <?= $data->submax . 'HR'; ?>
                </td>
            </tr>
            <tr>
                <th>Stop Treadmill</th>
                <td>
                    <?= $data->stop_treadmill; ?>
                </td>
            </tr>
            <tr>
                <th>Resume Hasil</th>
                <td>
                    <?= $data->resume_hasil; ?>
                </td>
            </tr>
        </table>
    </div>

    <div class="box-body">
        <?php if ($buttonAction): ?>
            <?= Html::a('<i class="fa fa-pencil"></i> Sunting Pemeriksaan Treadmill', ['/pemeriksaan-treadmill/update', 'id' => $data->id], ['class' => 'btn btn-success btn-flat']) ?>
            <?= Html::a('<i class="fa fa-print"></i> Export Pemeriksaan Treadmill to PDF', ['/pemeriksaan-treadmill/pdf/', 'id' => $data->id  ], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php endif ?>
    </div>