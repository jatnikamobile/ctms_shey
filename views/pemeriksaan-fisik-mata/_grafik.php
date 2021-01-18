<?php 
use miloschuman\highcharts\Highcharts;
use app\models\PemeriksaanFisikMata;
use app\components\Helper;

?>

<div class="box box-primary">
    <div class="box-body">
	    <div class="row">
	        <div class="col-sm-4">    
		        <?= Highcharts::widget([
		            'options' => [
		                'credits' => false,
		                'title' => ['text' => 'Jumlah Kacamata'],
		                'exporting' => ['enabled' => true],
		                'xAxis' => [
		                    'categories' => ['Pakai', 'Tidak Pakai'],
		                ],
		                'yAxis' =>[
		                    'title' => ['text' => 'Jumlah'],
		                ],
		                'plotOptions' => [
		                    'pie' => [
		                        'cursor' => 'pointer',
		                    ],
		                ],
		                'series' => [
		                    [
		                        'type' => 'column',
		                        'name' => 'Jumlah',
		                        'data' => PemeriksaanFisikMata::getGrafikKacamata(),
		                    ],
		                ],
		            ],
		        ]);?>
	    	</div>
	    </div>
    </div>
</div>