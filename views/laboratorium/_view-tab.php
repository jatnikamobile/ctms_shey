<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 17:30
 */

use kartik\tabs\TabsX;

/* @var $this yii\web\View */

?>

<?php

$content1 =  $this->render('_view-hematologi',['model' => $model]);
$content2 =  $this->render('_view-kimia',['model' => $model]);
$content3 =  $this->render('_view-urinalisa',['model' => $model]);
$content4 =  $this->render('_view-narkoba',['model' => $model]);
$content5 =  $this->render('_view-imunoserologi',['model' => $model]);

$items = [
    [
        'label'=>'<i class="fa fa"></i> Hematologi',
        'content'=>$content1,
        'active'=>true
    ],
    [
        'label'=>'<i class="fa fa"></i> Kimia',
        'content'=>$content2,
    ],
    [
        'label'=>'<i class="fa fa"></i> Urinalisa',
        'content'=>$content3,
    ],
    [
        'label'=>'<i class="fa fa"></i> Pemeriksaan Narkoba',
        'content'=>$content4,
    ],
    [
        'label'=>'<i class="fa fa"></i> Imunoserologi',
        'content'=>$content5,
    ],

];

?>

<?php echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false
]); ?>