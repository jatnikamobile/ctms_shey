<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 16:23
 */

?>

<?= $form->field($model, 'kekuatan')->radioList([ 'Normal' => 'Normal', 'Paralisis' => 'Paralisis', 'Palese' => 'Palese', 'Lain-lain' => 'Lain-lain' ], ['prompt' => '- Pilih Kekuatan -']) ?>

<?= $form->field($model, 'varises')->radioList([ 'Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal', 'Lain-lain' => 'Lain-lain' ], ['prompt' => '- Pilih Varises -']) ?>

<?= $form->field($model, 'reflek_fisiologis')->radioList([ 'Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'], ['prompt' => '- Pilih Reflek Fisiologis -']) ?>

<?= $form->field($model, 'reflek_patologis')->radioList([ 'Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'], ['prompt' => '- Pilih Reflek Patologis -']) ?>

<?= $form->field($model, 'lainlain')->radioList([ 'Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal'], ['prompt' => '- Pilih Lain-lain -']) ?>

