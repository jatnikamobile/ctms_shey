<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 17:07
 */

?>

<div class="row">
    <div class="col-sm-6">

        <?= $form->field($model, 'ph',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
        ])->textInput([
            'type' => 'number',
            'min' => 1,
        ]) ?>

        <?= $form->field($model, 'berat_jenis',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
        ])->textInput([
            'type' => 'number',
            'min' => 1,
        ]) ?>

        <?= $form->field($model, 'protein',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
        ])->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>

        <?= $form->field($model, 'reduksi',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
        ])->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>

        <?= $form->field($model, 'bilirubin',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
        ])->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>

        <?= $form->field($model, 'urobilinogen',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
        ])->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>

        <?= $form->field($model, 'nitrit',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
        ])->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>

        <?= $form->field($model, 'keton',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
        ])->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>

        <?= $form->field($model, 'darah',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
        ])->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>
    </div>
    <div class="col-sm-6">
        <?= $form->field($model, 'mk_leukosit',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-4',
            ],
            'addon' => ['append' => ['content' => '/LPB']]
        ])->textInput([
            'type' => 'number',
            'min' => 1,
            'max' => 5
        ]) ?>

        <?= $form->field($model, 'mk_eritrosit',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-4',
            ],
            'addon' => ['append' => ['content' => '/LPB']]
        ])->textInput([
            'type' => 'number',
            'min' => 0,
            'max' => 1
        ]) ?>

        <?= $form->field($model, 'mk_silender',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
        ])->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>

        <?= $form->field($model, 'mk_epithel',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
        ])->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>

        <?= $form->field($model, 'mk_kristal',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
        ])->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>

        <?= $form->field($model, 'mk_lainlain',[
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-3',
            ],
        ])->radioList([ 'Negatif' => 'Negatif', 'Positif' => 'Positif', ]) ?>


    </div>
</div>
