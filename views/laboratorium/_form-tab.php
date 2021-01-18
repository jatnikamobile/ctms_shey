<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 15:52
 */

use kartik\tabs\TabsX;

/* @var $model \app\models\Laboratorium */

?>

<?php

$modelHematologi = $model->findOrCreateLaboratoriumHematologi(['create'=>false]);
$modelImunoserologi = $model->findOrCreateLaboratoriumImunoserologi(['create'=>false]);
$modelKimia = $model->findOrCreateLaboratoriumKimia(['create'=>false]);
$modelNarkoba = $model->findOrCreateLaboratoriumNarkoba(['create'=>false]);
$modelUrinalisa = $model->findOrCreateLaboratoriumUrinalisa(['create'=>false]);

$formHematologi = $this->render('//laboratorium-hematologi/_form-detail',['form'=>$form,'model' => $modelHematologi]);
$formImunoserologi = $this->render('//laboratorium-imunoserologi/_form-detail',['form'=>$form,'model' => $modelImunoserologi]);
$formKimia = $this->render('//laboratorium-kimia/_form-detail',['form'=>$form,'model' => $modelKimia]);
$formNarkoba = $this->render('//laboratorium-narkoba/_form-detail',['form'=>$form,'model' => $modelNarkoba]);
$formUrinalisa = $this->render('//laboratorium-urinalisa/_form-detail',['form'=>$form,'model' => $modelUrinalisa]);




$items = [
    [
        'label'=>'<i class="fa fa"></i> Hematologi',
        'content'=>$formHematologi,
        'active'=>true
    ],
    [
        'label'=>'<i class="fa fa"></i> Imunoserologi',
        'content'=>$formImunoserologi,
    ],
    [
        'label'=>'<i class="fa fa"></i> Kimia',
        'content'=>$formKimia,
    ],
    [
        'label'=>'<i class="fa fa"></i> Narkoba',
        'content'=>$formNarkoba,
    ],
    [
        'label'=>'<i class="fa fa"></i> Urinalisa',
        'content'=>$formUrinalisa,
    ]
];

?>

<?php echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false
]); ?>
