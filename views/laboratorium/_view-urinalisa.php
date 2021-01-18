<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$data = $model->findOrCreateLaboratoriumUrinalisa();
?>
    <div class="box-header">
        <h3 class="box-title">Detail Laboratorium Urinalisa
        </h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Urin Lengkap</th>
            </tr>
            <tr>
                <td width="20%">PH</td>
                <td width="80%">
                    <?= $data->ph; ?>
                </td>
            </tr>
            <tr>
                <td>Berat Jenis</td>
                <td> 
                    <?= $data->berat_jenis; ?>
                </td>
            </tr>
            <tr>
                <td>Protein</td>
                <td> 
                    <?= $data->protein; ?>
                </td>
            </tr>
            <tr>
                <td>Reduksi</td>
                <td> 
                    <?= $data->reduksi; ?>
                </td>
            </tr>
            <tr>
                <td>Bilirubin</td>
                <td> 
                    <?= $data->bilirubin; ?>
                </td>
            </tr>
            <tr>
                <td>Urobilinogen</td>
                <td> 
                    <?= $data->urobilinogen; ?>
                </td>
            </tr>
            <tr>
                <td>Nitrit</td>
                <td> 
                    <?= $data->nitrit; ?>
                </td>
            </tr>
            <tr>
                <td>Keton</td>
                <td> 
                    <?= $data->keton; ?>
                </td>
            </tr>
            <tr>
                <td>Darah</td>
                <td> 
                    <?= $data->darah; ?>
                </td>
            </tr>
            <tr>
                <th width="20%">Mikroskopis</th>
            </tr>
            <tr>
                <td width="20%">Leukosit</td>
                <td width="80%">
                    <?= $data->mk_leukosit; ?>
                </td>
            </tr>
            <tr>
                <td>Eritrosit</td>
                <td> 
                    <?= $data->mk_eritrosit; ?>
                </td>
            </tr>
            <tr>
                <td>Silender</td>
                <td> 
                    <?= $data->mk_silender; ?>
                </td>
            </tr>
            <tr>
                <td>Epithel</td>
                <td> 
                    <?= $data->mk_epithel; ?>
                </td>
            </tr>
            <tr>
                <td>Kristal</td>
                <td> 
                    <?= $data->mk_kristal; ?>
                </td>
            </tr>
            <tr>
                <td>Lain - Lain</td>
                <td> 
                    <?= $data->mk_lainlain; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Urinalisa', ['/laboratorium-urinalisa/update', 'id' => $data->id], ['class' => 'btn btn-success btn-flat']) ?>
    </div>