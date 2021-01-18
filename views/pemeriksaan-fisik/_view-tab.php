<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31/12/2018
 * Time: 17:26
 */

use kartik\tabs\TabsX;

?>

<?php
$content1 =  $this->render('_view-mata',['model' => $model]);
$content2 =  $this->render('_view-telinga',['model' => $model]) ;
$content3 =  $this->render('_view-timpani',['model' => $model]) ;
$content4 =  $this->render('_view-hidung',['model' => $model]) ;
$content5 =  $this->render('_view-leher',['model' => $model]) ;
$content6 =  $this->render('_view-mulut',['model' => $model]) ;
$content7 =  $this->render('_view-thorax',['model' => $model]) ;
$content8 =  $this->render('_view-abdomen',['model' => $model]) ;
$content9 =  $this->render('_view-manufer-ekstremitas',['model' => $model]) ;

$items = [
[
'label'=>'<i class="fa fa"></i> Mata',
'content'=>$content1,
'active'=>true
],
[
'label'=>'<i class="fa fa"></i> Telinga',
'content'=>$content2,
],
[
'label'=>'<i class="fa fa"></i> Timpani',
'content'=>$content3,
],
[
'label'=>'<i class="fa fa"></i> Hidung',
'content'=>$content4,
],
[
'label'=>'<i class="fa fa"></i> Leher',
'content'=>$content5,
],
[
'label'=>'<i class="fa fa"></i> Mulut',
'content'=>$content6,
],
[
'label'=>'<i class="fa fa"></i> Thorax',
'content'=>$content7,
],
[
'label'=>'<i class="fa fa"></i> Abdomen',
'content'=>$content8,
],
[
'label'=>'<i class="fa fa"></i> Manufer Ekstremitas',
'content'=>$content9,
],
];

?>

<?php echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false
]); ?>
