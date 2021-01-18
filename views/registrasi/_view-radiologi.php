<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$rad = $model->findOrCreateRadiologi();
?>
    <div class="box-header">
        <h3 class="box-title">Radiologi</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th>C O R</th>
                <td>
                    <?= $rad->cor ; ?>
                </td>
            </tr>
            <tr>
                <th>Pulmo</th>
                <td> 
                    <?= $rad->pulmo; ?>
                </td>
            </tr>
            <tr>
                <th>Sinus & Diafragma</th>
                <td>
                    <?= $rad->sinus_diafragma; ?>
                </td>
            </tr>
            <tr>
                <th>Tulang dan Jaringan Lunak</th>
                <td>
                    <?= $rad->tulang_jaringan_lunak ; ?>
                </td>
            </tr>
            <tr>
                <th width="20%">Hasil Pemeriksaan</th>
                <td width="80%">
                    <?= $rad->hasil_pemeriksaan ; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-footer">
        <?php if ($buttonAction): ?>
            <?= Html::a('<i class="fa fa-pencil"></i> Sunting Radiologi', ['/radiologi/update', 'id' => $rad->id], ['class' => 'btn btn-success btn-flat']) ?>
        <?php endif ?>
    </div>