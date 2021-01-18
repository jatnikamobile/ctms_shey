<?php 

use yii\grid\GridView;

?>
<div class="box box-primary">
	<div class="box-header with-border">
		<h2 class="box-title"><i class="fa fa-list"></i> Rekapitulasi pasien</h2>
	</div>
	<div class="box-body" style="height: 500px;overflow: auto;">
		<?= GridView::widget([
		    'dataProvider' => $dataProvider,
		    'filterModel' => $searchModel,
		    'columns' => 
		    [
		    	[
		            'attribute' => 'nik_pasien',
		            'label' => 'NIK',
		            'headerOptions' => ['style' => 'text-align:center; width: 130px'],
		            'contentOptions' => ['style' => 'text-align:center;'],
		        ],
		        [
		            'attribute' => 'nama_pasien',
		            'label' => 'Nama',
		            'headerOptions' => ['style' => 'text-align:center;'],
		            'contentOptions' => ['style' => 'text-align:left;'],
		        ],
		        [
		            'attribute' => 'pasien_id',
		            'label' => 'Jenis<br>Kelamin',
		            'encodeLabel' => false,
		            'format' => 'raw',
		            'value' => function($data) {
		            	return @$data->pasien->jenis_kelamin;
		            },
		            'headerOptions' => ['style' => 'text-align:center; width: 10px'],
		            'contentOptions' => ['style' => 'text-align:center;'],
		        ],
		        [
		            'attribute' => 'pasien_id',
		            'label' => 'Umur',
		            'format' => 'raw',
		            'value' => function($data) {
                        $umur = date_diff(date_create(date('Y-m-d')),date_create($data->tanggal_lahir));
		            	return $umur->y.' TAHUN';
		            },
		            'headerOptions' => ['style' => 'text-align:center;'],
		            'contentOptions' => ['style' => 'text-align:center;'],
		        ],
		        [
		            'attribute' => 'hasil',
		            'label' => 'Hasil',
		            'value' => function($data){
		            	return @$data->jawaban;
		            },
		            'headerOptions' => ['style' => 'text-align:center;'],
		            'contentOptions' => ['style' => 'text-align:center; font-weight: bold'],
		        ],		        
		    ]
		]); ?>
	</div>
</div>