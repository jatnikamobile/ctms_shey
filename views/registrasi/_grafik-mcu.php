<?php 

use miloschuman\highcharts\Highcharts;

//print_r($searchModel->getGrafik());
?>

<div class="row">
	<div class="col-sm-12">
	    <div class="box box-info">
	        <div class="box-header with-border">
	            <h2 class="box-title"><i class="fa fa-pencil-square-o"></i> Statistik Jumlah Protokol Berdasarkan Hasil Uji Klinis  </h2>
	        </div>
	        <div class="box-body">
	            <?php try {
                    echo Highcharts::widget([
                        'options' => [
                            'credits' => false,
                            'title' => ['text' => 'Statistik Jumlah Protokol Berdasarkan Hasil Uji Klinis '],
                            'exporting' => ['enabled' => true],
                            'plotOptions' => [
                                'line' => [
                                    'cursor' => 'pointer',
                                ],
                            ],
                            'xAxis' => [
                                'categories' => $searchModel->getGrafikKoordinatX(),
                            ],
                            'series' => [
                                [
                                    'type' => 'column',
                                    'name' => 'Pasien',
                                    'data' => $searchModel->getGrafik(),
                                ]

                            ],
                        ],
                    ]);
                } catch (Exception $e) {
	                print_r($e->getMessage());
                } ?>
	        </div>
	    </div>
	</div>
</div>
