<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$data = $model->findOrCreateLaboratoriumImunoserologi();
?>
    <div class="box-header">
        <h3 class="box-title">Detail Laboratorium Pemeriksaan Imunoserologi
        </h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Hbs - Ag</th>
                <td width="80%">
                    <?= $data->hbs_ag; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-footer">
        <?= Html::a('<i class="fa fa-pencil"></i> Sunting Imunoserologi', ['/laboratorium-imunoserologi/update', 'id' => $data->id], ['class' => 'btn btn-success btn-flat']) ?>
    </div>