<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 16:23
 */

?>

<?= $form->field($model, 'tiroid')->radioList([ 'Tidak Teraba' => 'Tidak Teraba', 'Membesar' => 'Membesar' ], ['prompt' => '- Pilih Tiroid -']) ?>

<?= $form->field($model, 'limfonoid')->radioList([ 'Tidak Teraba' => 'Tidak Teraba', 'Membesar' => 'Membesar' ], ['prompt' => '- Pilih Limfonoid -']) ?>

<?= $form->field($model, 'tenggorokan')->radioList([ 'Normal' => 'Normal', 'Hiperemis' => 'Hiperemis', 'Pembesaran Tonsil' => 'Pembesaran Tonsil' ], ['prompt' => '- Pilih Tenggorokan -']) ?>

<?= $form->field($model, 'tonsil')->radioList([ 'Normal' => 'Normal', 'Pembesaran Tonsil' => 'Pembesaran Tonsil' ], ['prompt' => '- Pilih Tonsil -']) ?>

<?= $form->field($model, 'faring')->radioList([ 'Normal' => 'Normal', 'Hiperemis' => 'Hiperemis' ], ['prompt' => '- Pilih Faring -']) ?>

