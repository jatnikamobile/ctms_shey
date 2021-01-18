<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Registrasi */
$mata = $model->findOrCreatePemeriksaanFisikMata();
?>
    <div class="box-header">
        <h3 class="box-title">Detail Pemeriksaan Fisik Mata</h3>
    </div>

    <div class="box-body">
        <table class="table">
            <tr>
                <th>Kacamata</th>
                <td>
                    <?= $mata->kacamata ; ?>
                </td>
            </tr>
            <tr>
                <th>Kelopak Mata</th>
                <td> 
                    <?= $mata->kelopak_mata; ?>
                </td>
            </tr>
            <tr>
                <th>Konjungtiva</th>
                <td>
                    <?= $mata->konjungtiva; ?>
                </td>
            </tr>
            <tr>
                <th>Sklera</th>
                <td>
                    <?= $mata->sklera; ?>
                </td>
            </tr>
            <tr>
                <th width="20%">Pupil</th>
                <td width="80%">
                    <?= $mata->pupil; ?>
                </td>
            </tr>
            <tr>
                <th>Buta Warna</th>
                <td>
                    <?= $mata->buta_warna ; ?>
                </td>
            </tr>
            <tr>
                <th>Refraksi</th>
                <td> 
                    <?= $mata->refraksi; ?>
                </td>
            </tr>
            <tr>
                <th>Addisi</th>
                <td>
                    <?= $mata->addisi; ?>
                </td>
            </tr>
            <tr>
                <th>Funduskopi</th>
                <td>
                    <?= $mata->funduskopi; ?>
                </td>
            </tr>
            <tr>
                <th>Tekanan Bola</th>
                <td>
                    <?= $mata->tekanan_bola ; ?>
                </td>
            </tr>
            <tr>
                <th>Mata Juling</th>
                <td> 
                    <?= $mata->mata_juling; ?>
                </td>
            </tr>
            <tr>
                <th>Tonometri</th>
                <td>
                    <?= $mata->tonometri; ?>
                </td>
            </tr>
        </table>
    </div>