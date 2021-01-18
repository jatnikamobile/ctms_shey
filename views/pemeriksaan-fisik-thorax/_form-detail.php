<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 16:21
 */

?>

<?= $form->field($model, 'dinding')->radioList([ 'Simetris' => 'Simetris', 'Asimetris' => 'Asimetris' ], ['prompt' => '- Pilih Dinding -']) ?>

<?= $form->field($model, 'paru_paru')->radioList([ 'Vesikuler' => 'Vesikuler', 'Slam' => 'Slam', 'Wheezing' => 'Wheezing', 'Ronkhi' => 'Ronkhi', 'Lain-Lain' => 'Lain-Lain' ], ['prompt' => '- Pilih Paru-Paru -']) ?>

<?= $form->field($model, 'jantung')->radioList([ 'Normal' => 'Normal', 'Mur-mur' => 'Mur-mur', 'Extrasistole' => 'Extrasistole', 'Galloy' => 'Galloy' ], ['prompt' => '- Pilih Jantung -']) ?>

