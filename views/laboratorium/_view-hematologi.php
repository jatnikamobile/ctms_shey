<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$data = $model->findOrCreateLaboratoriumHematologi();
?>
    <div class="box-header">
        <h3 class="box-title">Detail Laboratorium Hematologi</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Darah Lengkap</th>
                <th></th>
            </tr>
            <tr>
                <td width="20%">Hemoglobin</td>
                <td width="80%">
                    <?= $data->hemoglobin . ' gr/dl'; ?>
                </td>
            </tr>
            <tr>
                <td>Lekosit</td>
                <td> 
                    <?= $data->lekosit . ' mm3'; ?>
                </td>
            </tr>
            <tr>
                <td>Hematokrit</td>
                <td> 
                    <?= $data->hematokrit. ' %'; ?>
                </td>
            </tr>
            <tr>
                <td>Trombosit</td>
                <td> 
                    <?= $data->trombosit. ' mm3'; ?>
                </td>
            </tr>
            <tr>
                <td>Eritrosit</td>
                <td> 
                    <?= $data->eritrosit. ' mm3'; ?>
                </td>
            </tr>
            <tr>
                <th width="20%">Hitung Jenis</th>
                <th></th>
            </tr>
            <tr>
                <td width="20%">Basofil</td>
                <td width="80%">
                    <?= $data->hj_basofil . ' %'; ?>
                </td>
            </tr>
            <tr>
                <td>Eosinofil</td>
                <td> 
                    <?= $data->hj_eosinofil . ' %'; ?>
                </td>
            </tr>
            <tr>
                <td>Neutrofil Batang</td>
                <td> 
                    <?= $data->hj_neutrofil_batang. ' %'; ?>
                </td>
            </tr>
            <tr>
                <td>Neutrofil Segment</td>
                <td> 
                    <?= $data->hj_neutrofil_segment. ' %'; ?>
                </td>
            </tr>
            <tr>
                <td>Limfosit</td>
                <td> 
                    <?= $data->hj_limfosit. ' %'; ?>
                </td>
            </tr>
            <tr>
                <td>Monosit</td>
                <td> 
                    <?= $data->hj_monosit. ' %'; ?>
                </td>
            </tr>
            <tr>
                <th>LED</th>
                <td> 
                    <?= $data->led. ' mm/jam'; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Hematologi', ['/laboratorium-hematologi/update', 'id' => $data->id], ['class' => 'btn btn-success btn-flat']) ?>
    </div>