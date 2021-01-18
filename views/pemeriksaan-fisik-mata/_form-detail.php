<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 16:19
 */

?>

<?= $form->field($model, 'kacamata')->radioList([ 'Pakai' => 'Pakai', 'Tidak Pakai' => 'Tidak Pakai', ]) ?>

<?= $form->field($model, 'kelopak_mata')->radioList([ 'Normal' => 'Normal', 'Hordeolum' => 'Hordeolum', 'Lain-lain' => 'Lain-lain', ]) ?>

<?= $form->field($model, 'konjungtiva')->radioList([ 'Normal' => 'Normal', 'Anemis' => 'Anemis', 'Lain-lain' => 'Lain-lain', ]) ?>

<?= $form->field($model, 'sklera')->radioList([ 'Normal' => 'Normal', 'Icteric' => 'Icteric', 'Lain-lain' => 'Lain-lain', ]) ?>

<?= $form->field($model, 'pupil')->radioList([ 'Isokor' => 'Isokor', 'Lain-lain' => 'Lain-lain', ]) ?>

<?= $form->field($model, 'buta_warna')->radioList([ 'Normal' => 'Normal', 'Parsial' => 'Parsial', 'Total' => 'Total', ]) ?>

<?= $form->field($model, 'refraksi')->radioList([ 'Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal', ]) ?>

<?= $form->field($model, 'addisi')->radioList([ 'Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal', ]) ?>

<?= $form->field($model, 'funduskopi')->radioList([ 'Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal' ]) ?>

<?= $form->field($model, 'tekanan_bola')->radioList([ 'Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal', ]) ?>

<?= $form->field($model, 'mata_juling')->radioList([ 'Normal' => 'Normal', 'Juling Kanan' => 'Juling Kanan', 'Juling Kiri' => 'Juling Kiri', 'Keduanya' => 'Keduanya', ]) ?>

<?= $form->field($model, 'tonometri')->radioList([ '8/7.5 (ODS)' => '8/7.5 (ODS)', 'Tidak Normal' => 'Tidak Normal', ]) ?>
