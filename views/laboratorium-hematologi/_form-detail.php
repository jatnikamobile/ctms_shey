<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 17:05
 */

?>

<div class="row">
    <div class="col-sm-6">

        <?= $form->field($model, 'hemoglobin',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-4',
            ],
            'addon' => ['append' => ['content' => 'gr/dl']]
        ])->textInput([
            'min' => 0
        ]) ?>

        <?= $form->field($model, 'lekosit',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-4',
            ],
            'addon' => ['append' => ['content' => 'mm3']]
        ])->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>

        <?= $form->field($model, 'hematokrit',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-4',
            ],
            'addon' => ['append' => ['content' => '%']]
        ])->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>

        <?= $form->field($model, 'trombosit',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-4',
            ],
            'addon' => ['append' => ['content' => 'mm3']]
        ])->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>

        <?= $form->field($model, 'eritrosit',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-4',
            ],
            'addon' => ['append' => ['content' => 'mm3']]
        ])->textInput([
            'min' => 0
        ]) ?>

        <?= $form->field($model, 'led',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-4',
            ],
            'addon' => ['append' => ['content' => 'mm/jam']]
        ])->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>

    </div>

    <div class="col-sm-6">

        <?= $form->field($model, 'hj_basofil',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
            'addon' => ['append' => ['content' => '%']]
        ])->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>

        <?= $form->field($model, 'hj_eosinofil',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
            'addon' => ['append' => ['content' => '%']]
        ])->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>
        <?= $form->field($model, 'hj_neutrofil_batang',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
            'addon' => ['append' => ['content' => '%']]
        ])->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>
        <?= $form->field($model, 'hj_neutrofil_segment',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
            'addon' => ['append' => ['content' => '%']]
        ])->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>
        <?= $form->field($model, 'hj_limfosit',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
            'addon' => ['append' => ['content' => '%']]
        ])->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>
        <?= $form->field($model, 'hj_monosit',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
            'addon' => ['append' => ['content' => '%']]
        ])->textInput([
            'type' => 'number',
            'min' => 0
        ]) ?>

    </div>
</div>
