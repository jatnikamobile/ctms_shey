<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 16:23
 */

?>

<?= $form->field($model, 'bentuk_hidung')->radioList([ 'Normal' => 'Normal', 'Lain-lain' => 'Lain-lain' ], ['prompt' => '- Pilih Bentuk Hidung -']) ?>

<?= $form->field($model, 'septum_deviasi')->radioList([ 'Ada' => 'Ada', 'Tidak Ada' => 'Tidak Ada' ], ['prompt' => '- Pilih Septum Deviasi -']) ?>

<?= $form->field($model, 'conchae')->radioList([ 'Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal' ], ['prompt' => '- Pilih Conchae -']) ?>

