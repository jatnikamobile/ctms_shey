<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$data = $model->findOrCreateLaboratoriumKimia();
?>
    <div class="box-header">
        <h3 class="box-title">Detail Laboratorium Kimia
        </h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Faal Hati</th>
                <th></th>
            </tr>
            <tr>
                <td width="20%">SGOT</td>
                <td width="80%">
                    <?= $data->faal_hati_sgot . ' u/l'; ?>
                </td>
            </tr>
            <tr>
                <td>SGPT</td>
                <td> 
                    <?= $data->faal_hati_sgpt . ' u/l'; ?>
                </td>
            </tr>
            <tr>
                <th width="20%">Profil Lemak</th>
            </tr>
            <tr>
                <td width="20%">Kolesterol Total</td>
                <td width="80%">
                    <?= $data->lemak_kolesterol_total . ' mg/dL'; ?>
                </td>
            </tr>
            <tr>
                <td>Trigliserida</td>
                <td> 
                    <?= $data->lemak_trigliserida . ' mg/dL'; ?>
                </td>
            </tr>
            <tr>
                <td>Kolesterol HDL</td>
                <td> 
                    <?= $data->lemak_kolesterol_hdl . ' mg/dL'; ?>
                </td>
            </tr>
            <tr>
                <td>Kolesterol LDL</td>
                <td> 
                    <?= $data->lemak_kolesterol_ldl . ' mg/dL'; ?>
                </td>
            </tr>
            <tr>
                <th width="20%">Diabetes</th>
            </tr>
            <tr>
                <td width="20%">Glukosa Puasa</td>
                <td width="80%">
                    <?= $data->diabetes_glukosa_puasa . ' mg/dL'; ?>
                </td>
            </tr>
            <tr>
                <td>Glukosa 2 Jam PP</td>
                <td> 
                    <?= $data->diabetes_glukosa_2_jam . ' mg/dL'; ?>
                </td>
            </tr>
            <tr>
                <td>Gamma GT</td>
                <td> 
                    <?= $data->diabetes_gamma_gt . ' u/l'; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Kimia', ['/laboratorium-kimia/update', 'id' => $data->id], ['class' => 'btn btn-success btn-flat']) ?>
    </div>