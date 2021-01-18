<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 16:20
 */

?>

<?= $form->field($model, 'mucosa_mulut')->radioList([ 'Normal' => 'Normal', 'Stomatitis' => 'Stomatitis', 'Lain-Lain' => 'Lain-Lain' ], ['prompt' => '- Pilih Mucosa Mulut -']) ?>

<?= $form->field($model, 'kelainan_gigi')->radioList([ 'Tidak ada Kelainan' => 'Tidak ada Kelainan', 'Caries' => 'Caries', 'Tambal' => 'Tambal', 'Calkulus' => 'Calkulus' ], ['prompt' => '- Pilih Kelainan Gigi -']) ?>

<?= $form->field($model, 'lidah')->radioList([ 'Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal' ], ['prompt' => '- Pilih Lidah -']) ?>

