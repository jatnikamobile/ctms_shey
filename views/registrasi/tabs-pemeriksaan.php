<?php 

use kartik\tabs\TabsX;

$content1 =  $this->render('_view-pasien',[
	'model' => $model, 
	'buttonAction' => $buttonAction
]);

$content2 =  $this->render('_view-pemeriksaan-fisik',[
	'model' => $model, 
	'buttonAction' => $buttonAction
]);

$content3 =  $this->render('_view-laboratorium',[
	'model' => $model, 
	'buttonAction' => $buttonAction
]);

$content4 =  $this->render('_view-radiologi',[
	'model' => $model, 
	'buttonAction' => $buttonAction
]);

$content5 =  $this->render('_view-pemeriksaan-spirometri',[
	'model' => $model, 
	'buttonAction' => $buttonAction
]);

$content6 =  $this->render('_view-pemeriksaan-audiometri',[
	'model' => $model, 
	'buttonAction' => $buttonAction
]);

$content7 =  $this->render('_view-pemeriksaan-ekg',[
	'model' => $model, 
	'buttonAction' => $buttonAction
]);

$content8 =  $this->render('_view-pemeriksaan-treadmill',[
	'model' => $model, 
	'buttonAction' => $buttonAction
]);

$content9 =  $this->render('_view-pemeriksaan-usg',[
	'model' => $model, 
	'buttonAction' => $buttonAction
]);

$content10 =  $this->render('_view-kesimpulan',[
	'model' => $model, 
	'buttonAction' => $buttonAction
]);


$tab = null;
if($tab==null) {
    $tab='pasien';
}

$items = [
    [
        'label' => '<i class="fa fa-user"></i> Pasien',
        'content' => $content1,
        'active'=>($tab=='pasien')
    ],
    [
        'label' => '<i class="fa fa-stethoscope"></i> Pemeriksaan Fisik',
        'content' => $content2,
        'active'=>($tab=='pemeriksaan-fisik')
    ],
    [
        'label' => '<i class="fa fa-medkit"></i> Laboratorium',
        'content' => $content3,
        'active'=>($tab=='laboratorium')
    ],
    [
        'label' => '<i class="fa fa-hospital-o"></i> Radiologi',
        'content' => $content4,
        'active'=>($tab=='radiologi')
    ],
    [
        'label' => '<i class="fa fa-heartbeat"></i> Spirometri',
        'content' => $content5,
        'active'=>($tab=='spirometri')
    ],
    [
        'label' => '<i class="fa fa-deaf"></i> AudioMetri',
        'content' => $content6,
        'active'=>($tab=='audiometri')
    ],
    [
        'label' => '<i class="fa fa-heartbeat"></i> E K G',
        'content' => $content7,
        'active'=>($tab=='ekg')
    ],
    [
        'label' => '<i class="fa fa-plus-square"></i> Treadmill',
        'content' => $content8,
        'active'=>($tab=='kesimpulan')
    ],
    [
        'label' => '<i class="fa fa-stethoscope"></i> U S G',
        'content' => $content9,
        'active'=>($tab=='usg')
    ],
    [
        'label' => '<i class="fa fa-plus-circle"></i> Kesimpulan',
        'content' => $content10,
        'active'=>($tab=='kesimpulan')
    ],
];

?>

<?= TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false
]); ?>