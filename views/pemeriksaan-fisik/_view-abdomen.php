<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$data = $model->findOrCreatePemeriksaanFisikAbdomen();
?>
    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Abdomen</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Dinding</th>
                <td width="80%">
                    <?= $data->dinding; ?>
                </td>
            </tr>
            <tr>
                <th>Hati</th>
                <td> 
                    <?= $data->hati; ?>
                </td>
            </tr>
            <tr>
                <th>Limpa</th>
                <td> 
                    <?= $data->limpa; ?>
                </td>
            </tr>
            <tr>
                <th>Usus</th>
                <td> 
                    <?= $data->usus; ?>
                </td>
            </tr>
            <tr>
                <th>Hernia</th>
                <td> 
                    <?= $data->hernia; ?>
                </td>
            </tr>
            <tr>
                <th>Scrotalis</th>
                <td> 
                    <?= $data->scrotalis; ?>
                </td>
            </tr>
        </table>
    </div>