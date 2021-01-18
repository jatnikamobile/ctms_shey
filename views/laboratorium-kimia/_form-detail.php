<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 17:06
 */

?>

<?= $form->field($model, 'faal_hati_sgot',[
    'horizontalCssClasses' => [
        'label' => 'col-sm-2',
        'wrapper' => 'col-sm-2',
    ],
    'addon' => ['append' => ['content' => 'u/l']]
])->textInput([
    'type' => 'number',
    'min' => 0
]) ?>

<?= $form->field($model, 'faal_hati_sgpt',[
    'horizontalCssClasses' => [
        'label' => 'col-sm-2',
        'wrapper' => 'col-sm-2',
    ],
    'addon' => ['append' => ['content' => 'u/l']]
])->textInput([
    'type' => 'number',
    'min' => 0
]) ?>

<?= $form->field($model, 'lemak_kolesterol_total',[
    'horizontalCssClasses' => [
        'label' => 'col-sm-2',
        'wrapper' => 'col-sm-2',
    ],
    'addon' => ['append' => ['content' => 'mg/dL']]
])->textInput([
    'type' => 'number',
    'min' => 0
]) ?>

<?= $form->field($model, 'lemak_trigliserida',[
    'horizontalCssClasses' => [
        'label' => 'col-sm-2',
        'wrapper' => 'col-sm-2',
    ],
    'addon' => ['append' => ['content' => 'mg/dL']]
])->textInput([
    'type' => 'number',
    'min' => 0
]) ?>

<?= $form->field($model, 'lemak_kolesterol_hdl',[
    'horizontalCssClasses' => [
        'label' => 'col-sm-2',
        'wrapper' => 'col-sm-2',
    ],
    'addon' => ['append' => ['content' => 'mg/dL']]
])->textInput([
    'type' => 'number',
    'min' => 0
]) ?>

<?= $form->field($model, 'lemak_kolesterol_ldl',[
    'horizontalCssClasses' => [
        'label' => 'col-sm-2',
        'wrapper' => 'col-sm-2',
    ],
    'addon' => ['append' => ['content' => 'mg/dL']]
])->textInput([
    'type' => 'number',
    'min' => 0
]) ?>

<?= $form->field($model, 'diabetes_glukosa_puasa',[
    'horizontalCssClasses' => [
        'label' => 'col-sm-2',
        'wrapper' => 'col-sm-2',
    ],
    'addon' => ['append' => ['content' => 'mg/dL']]
])->textInput([
    'type' => 'number',
    'min' => 0
]) ?>

<?= $form->field($model, 'diabetes_glukosa_2_jam',[
    'horizontalCssClasses' => [
        'label' => 'col-sm-2',
        'wrapper' => 'col-sm-2',
    ],
    'addon' => ['append' => ['content' => 'mg/dL']]
])->textInput([
    'type' => 'number',
    'min' => 0
]) ?>

<?= $form->field($model, 'diabetes_gamma_gt',[
    'horizontalCssClasses' => [
        'label' => 'col-sm-2',
        'wrapper' => 'col-sm-2',
    ],
    'addon' => ['append' => ['content' => 'u/l']]
])->textInput([
    'type' => 'number',
    'min' => 0
]) ?>
