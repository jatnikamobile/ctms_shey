<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 17:07
 */

?>


<?= $form->field($model, 'methamphetamine')->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>

<?= $form->field($model, 'cocain')->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>

<?= $form->field($model, 'amphetamine')->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>

<?= $form->field($model, 'morphine')->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>

<?= $form->field($model, 'mariyuana')->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>

