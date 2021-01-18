<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$kes = $model->findOrCreateKesimpulan();
?>
    <div class="box-header">
        <h3 class="box-title">Kesimpulan</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Riwayat Kesehatan Dulu</th>
                <td width="80%">
                    <?= @$model->pemeriksaanFisik->riwayat_kesehatan_dulu ; ?>
                </td>
            </tr>
            <tr>
                <th>Kebiasaan</th>
                <td>
                    <?= @$model->pemeriksaanFisik->kebiasaan ; ?>
                </td>
            </tr>
            <tr>
                <th>Tekanan Darah</th>
                <td>
                    <?= $model->TekananDarah(@$model->pemeriksaanFisik->sistolik, @$model->pemeriksaanFisik->diastolik) ; ?>
                </td>
            </tr>
            <tr>
                <th>BMI</th>
                <td>
                    <?= $model->BodyMassIndex(@$model->pemeriksaanFisik->berat_badan, @$model->pemeriksaanFisik->tinggi_badan); ?>
                </td>
            </tr>
            <tr>
                <th>Laboratorium</th>
                <td>
                    <?php if (@$model->dataLaboratorium->hasil_pemeriksaan == 'Normal'){
                            echo '<span class="label label-success"> Normal </span>';
                        }
                        else if (@$model->dataLaboratorium->hasil_pemeriksaan == 'Dalam Batas Normal'){
                            echo '<span class="label label-warning"> Dalam Batas Normal </span>';
                        }
                        else if (@$model->dataLaboratorium->hasil_pemeriksaan == 'Abnormal'){
                            echo '<span class="label label-danger"> Abnormal </span>';
                        } 
                    ?>
                </td>
            </tr>
            <tr>
                <th>Radiologi</th>
                <td>
                    <?php if (@$model->radiologi->hasil_pemeriksaan == 'Normal'){
                            echo '<span class="label label-success"> Normal </span>';
                        }
                        else if (@$model->radiologi->hasil_pemeriksaan == 'Dalam Batas Normal'){
                            echo '<span class="label label-warning"> Dalam Batas Normal </span>';
                        }
                        else if (@$model->radiologi->hasil_pemeriksaan == 'Abnormal'){
                            echo '<span class="label label-danger"> Abnormal </span>';
                        } 
                    ?>
                </td>
            </tr>
            <tr>
                <th>Kesimpulan</th>
                <td>
                    <?= $kes->isi_kesimpulan; ?>
                </td>
            </tr>
            <tr>
                <th>Saran</th>
                <td>
                    <?= $kes->saran;  ?>
                </td>
            </tr>
            <tr>
                <th>Diagnosa Kerja</th>
                <td>
                    <?= @$kes->diagnosa->nama; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-footer">
        <?php if ($buttonAction): ?>
            <?= Html::a('<i class="fa fa-pencil"></i> Sunting Kesimpulan', ['/kesimpulan/update', 'id' => $kes->id], ['class' => 'btn btn-success btn-flat']) ?>
            <?= Html::a('<i class="glyphicon glyphicon-print"></i> Export Kesimpulan to PDF', ['/registrasi/pdf', 'id' => $model->id], ['class' => 'btn btn-primary', 'target' => '_blank']) ?>
        <?php endif ?>
    </div>