<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$lab = $model->findOrCreateLaboratorium();
?>
    <div class="box-header">
        <h3 class="box-title">Laboratorium</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th width="20%">Hasil Pemeriksaan</th>
                <td width="80%">
                    <?= $lab->hasil_pemeriksaan ; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="box-footer">
        <?php if ($buttonAction): ?>
            <?= Html::a('<i class="fa fa-pencil"></i> Sunting Laboratorium', ['/laboratorium/update', 'id' => $lab->id], ['class' => 'btn btn-success btn-flat']) ?>
            <?php // Html::a('<i class="fa fa-mail-forward"></i> Detail Laboratorium', ['/laboratorium/view/', 'id' => $lab->id  ], ['class' => 'btn btn-warning btn-flat']) ?>
            <?= Html::a('<i class="fa fa-print"></i> Export Laboratorium to PDF', ['/laboratorium/pdf/', 'id' => $lab->id  ], ['class' => 'btn btn-primary btn-flat']) ?>
        <?php endif ?>
    </div>

    <div class="box-body">
        <?= $this->render('//laboratorium/_view-tab',['model'=>$model->findOrCreateLaboratorium()]); ?>
    </div>