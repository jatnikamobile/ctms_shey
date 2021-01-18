<?php 

use app\models\PemeriksaanRincianPilihanSearch;
use yii\grid\GridView;
use yii\helpers\Html;

?>

<div class="box box-primary">
	<div class="box-header with-border">
		<h2 class="box-title"><i class="fa fa-list"></i> Rekapitulasi Hasil</h2>
	</div>
	<div class="box-body" style="height: 500px;overflow: auto;">
	    <?php 
	        $pilihanSearchModel = new PemeriksaanRincianPilihanSearch();
	        $pilihanSearchModel->id_pemeriksaan_sub_rincian = $searchModel->id_pemeriksaan_sub_rincian;
	        $pilihanSearchModel->id_pemeriksaan_sub = $searchModel->id_pemeriksaan_sub;
	        $pilihanSearchModel->id_pemeriksaan = $searchModel->id_pemeriksaan;

	        $pilihanDataProvider = $pilihanSearchModel->searchAnalisisMcu(Yii::$app->request->queryParams);
	    ?>

	    <?= GridView::widget([
	        'dataProvider' => $pilihanDataProvider,
	        'filterModel' => $pilihanSearchModel,
	        'columns' => [
	            [
	                'class' => 'yii\grid\SerialColumn',
	                'header' => 'No',
	                'headerOptions' => ['style' => 'text-align:center; width: 55px'],
	                'contentOptions' => ['style' => 'text-align:center']
	            ],
	            [
	                'attribute' => 'nama',
	                'format' => 'raw',
	                'headerOptions' => ['style' => 'text-align:center;'],
	                'contentOptions' => ['style' => 'text-align:left;'],
	            ],
	            [
	                'label' => 'Hasil',
	                'value' => function($data) use ($searchModel) {
	                	return $data->getCountRincianHasil($searchModel);
	                },
	                'format' => 'raw',
	                'headerOptions' => ['style' => 'text-align:center; width: 10px'],
	                'contentOptions' => ['style' => 'text-align:center; font-weight: bold'],
	            ],
                [
                    'attribute' => '',
                    'format'    => 'raw',
                    'value'     => function($data){
	                        return urldecode(Yii::$app->request->url);
//                        return Html::button('<i class="fa fa-eye"></i>',['class'=>'btn btn-info']);
                    },
                ],
	        ],
	    ]); ?>
		
	</div>
</div>
