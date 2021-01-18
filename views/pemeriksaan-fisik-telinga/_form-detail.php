<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 16:21
 */

?>

<?= $form->field($model, 'bentuk_telinga')->radioList([ 'Normal' => 'Normal', 'Lain-lain' => 'Lain-lain' ]) ?>

<?= $form->field($model, 'membrane')->radioList([ 'Normal' => 'Normal', 'Tidak Normal' => 'Tidak Normal' ]) ?>

