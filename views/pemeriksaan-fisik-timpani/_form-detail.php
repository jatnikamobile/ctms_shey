<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 16:22
 */

?>

<?= $form->field($model, 'serumen')->radioList([ '-/-' => '-/-', '-/+' => '-/+', '+/-' => '+/-', '+/+' => '+/+' ], ['prompt' => '- Pilih Serumen -']) ?>

<?= $form->field($model, 'lainlain')->radioList([ 'Normal' => 'Normal', 'Lain-lain' => 'Lain-lain' ], ['prompt' => '- Pilih Lain Lain -']) ?>

