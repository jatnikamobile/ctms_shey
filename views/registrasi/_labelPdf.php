<?php

use yii\helpers\Html;
use app\models\Registrasi;
use app\components\Helper;
?>
<div style="float: left; width: 20%; text-transform: uppercase;">
    <table border="0">
        <tr>
            <td><?= "MCU : ".$model->no_mcu; ?></td>
            <td align="right"><?= Helper::getTanggalSingkat($model->tanggal) ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->nik.' / '.@$model->pasien->nama ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= "K : ".@$model->pasien->jenis_kelamin." TTL : ".Helper::getTanggalSingkat(@$model->pasien->tanggal_lahir) ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->instansi->nama ?> </td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->unit->nama ?> </td>
        </tr>
        <tr>
            <td colspan="2" align="right">Hematologi</td>
        </tr>
    </table>
    <div>&nbsp;</div>
    <table border="0">
        <tr>
            <td><?= "MCU : ".$model->no_mcu; ?></td>
            <td align="right"><?= Helper::getTanggalSingkat($model->tanggal) ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->nik.' / '.@$model->pasien->nama ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= "K : ".@$model->pasien->jenis_kelamin." TTL : ".Helper::getTanggalSingkat(@$model->pasien->tanggal_lahir) ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->instansi->nama ?> </td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->unit->nama ?> </td>
        </tr>
        <tr>
            <td colspan="2" align="right">Kimia Darah</td>
        </tr>
    </table>
</div>
<div style="float: left; width: 20%;">
    <table border="0">
        <tr>
            <td><?= "MCU : ".$model->no_mcu; ?></td>
            <td align="right"><?= Helper::getTanggalSingkat($model->tanggal) ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->nik.' / '.@$model->pasien->nama ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= "K : ".@$model->pasien->jenis_kelamin." TTL : ".Helper::getTanggalSingkat(@$model->pasien->tanggal_lahir) ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->instansi->nama ?> </td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->unit->nama ?> </td>
        </tr>
        <tr>
            <td colspan="2" align="right">Urine</td>
        </tr>
    </table>
    <div>&nbsp;</div>
    <table border="0">
        <tr>
            <td><?= "MCU : ".$model->no_mcu; ?></td>
            <td align="right"><?= Helper::getTanggalSingkat($model->tanggal) ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->nik.' / '.@$model->pasien->nama ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= "K : ".@$model->pasien->jenis_kelamin." TTL : ".Helper::getTanggalSingkat(@$model->pasien->tanggal_lahir) ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->instansi->nama ?> </td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->unit->nama ?> </td>
        </tr>
        <tr>
            <td colspan="2" align="right">Fisik Darah</td>
        </tr>
    </table>
</div>
<div style="float: left; width: 20%;">
    <table border="0">
        <tr>
            <td><?= "MCU : ".$model->no_mcu; ?></td>
            <td align="right"><?= Helper::getTanggalSingkat($model->tanggal) ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->nik.' / '.@$model->pasien->nama ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= "K : ".@$model->pasien->jenis_kelamin." TTL : ".Helper::getTanggalSingkat(@$model->pasien->tanggal_lahir) ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->instansi->nama ?> </td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->unit->nama ?> </td>
        </tr>
        <tr>
            <td colspan="2" align="right">...</td>
        </tr>
    </table>
    <div>&nbsp;</div>
    <table border="0">
        <tr>
            <td><?= "MCU : ".$model->no_mcu; ?></td>
            <td align="right"><?= Helper::getTanggalSingkat($model->tanggal) ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->nik.' / '.@$model->pasien->nama ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= "K : ".@$model->pasien->jenis_kelamin." TTL : ".Helper::getTanggalSingkat(@$model->pasien->tanggal_lahir) ?></td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->instansi->nama ?> </td>
        </tr>
        <tr>
            <td colspan="2"><?= @$model->pasien->unit->nama ?> </td>
        </tr>
        <tr>
            <td colspan="2" align="right">Rontgen</td>
        </tr>
    </table>
</div>
