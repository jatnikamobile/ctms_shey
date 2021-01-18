<?php 

use app\models\Instansi;
use app\models\Unit;
use app\models\Paket;
use app\models\Pemeriksaan;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\grid\GridView;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\User;
?>

<div class="row">
	<div class="col-sm-3">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h2 class="box-title"><i class="fa fa-search"></i> Filter Instansi</h2>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">
					<?php if (User::isInstansi()) { ?>
						<?= $form->field($searchModel, 'id_pasien_instansi')->widget(Select2::classname(), [
				            'data' =>  Instansi::getList(),
				            'options' => [
				              'placeholder' => '- Filter Instansi -',
				            ],
				            'pluginOptions' => [
				                'allowClear' => true,
				                'disabled' => true
				            ],
				        ])->label(false); ?>
				    <?php } else { ?>
				    	<?= $form->field($searchModel, 'id_pasien_instansi')->widget(Select2::classname(), [
				            'data' =>  Instansi::getList(),
				            'options' => [
				              'placeholder' => '- Cari Instansi -',
				            ],
				            'pluginOptions' => [
				                'allowClear' => true
				            ],
				        ])->label(false); ?>
				    <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-9">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h2 class="box-title"><i class="fa fa-search"></i> Filter Tanggal Registrasi</h2>
			</div>
			<div class="box-body">
				<div class="col-sm-6">
					<?= $form->field($searchModel, 'tanggal_awal')->widget(DatePicker::class, [
			                'value' => date('Y-m-d'),
			                'options' => ['placeholder' => 'Dari Tanggal'],
			                'pluginOptions' => [
			                    'autoclose'=>true,
			                    'allowClear' => true,
			                    'format' => 'yyyy-mm-dd'
			                ]
			        ])->label(false) ?>
				</div>
				<div class="col-sm-6">
					<?= $form->field($searchModel, 'tanggal_akhir')->widget(DatePicker::class, [
			                'value' => date('Y-m-d'),
			                'options' => ['placeholder' => 'Sampai Tanggal'],
			                'pluginOptions' => [
			                    'autoclose'=>true,
			                    'allowClear' => true,
			                    'format' => 'yyyy-mm-dd'
			                ]
			        ])->label(false) ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h2 class="box-title"><i class="fa fa-search"></i> Filter Protokol</h2>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">
						<?= $form->field($searchModel, 'id_pasien_unit')->widget(Select2::classname(), [
				            'data' =>  Unit::getList(),
				            'options' => [
				              'placeholder' => '- Filter Unit -',
				            ],
				            'pluginOptions' => [
				                'allowClear' => true
				            ],
				        ])->label(false); ?>
				    </div>
					<div class="col-sm-12">
						<?= $form->field($searchModel, 'paket_id')->widget(Select2::classname(), [
				            'data' =>  Paket::getList(),
				            'options' => [
				              'placeholder' => '- Filter Paket -',
				            ],
				            'pluginOptions' => [
				                'allowClear' => true
				            ],
				        ])->label(false); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-9">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h2 class="box-title"><i class="fa fa-search"></i> Filter Rincian Pemeriksaan</h2>
			</div>			
			<div class="box-body with-border">
				<div class="row">
					<div class="col-sm-6">
					<?php echo $form->field($searchModel, 'id_pemeriksaan')->widget(Select2::classname(), [
			            'data' =>  Pemeriksaan::getListIndukPemeriksaan(),
			            'options' => [
			              'placeholder' => '- Kelompok Analisa -',
			              'id' => 'analisa'
			            ],
			            'pluginOptions' => [
			                'allowClear' => true,
			            ],
			        ])->label(false); ?>
					</div>
					<div class="col-sm-6">


			        <?= $form->field($searchModel, 'id_pemeriksaan_sub')->widget(DepDrop::className(), [
			            'type'=>DepDrop::TYPE_SELECT2,
	                    'options' => [
	                        'placeholder' => '- Pilih Sub Analisa -',
	                        'id' => 'pemeriksaan-sub'
	                    ],
			            'pluginOptions' => [
	                        'depends' => ['analisa'],
	                        'placeholder' => '- Pilih Sub Analisa -',
	                        'url' => Url::to(['/registrasi/subanalisa','id_pemeriksaan_sub'=> $searchModel->id_pemeriksaan_sub]),
			                'initialize' => true,
			                'params'=>['pemeriksaan-sub']
			            ]
			        ])->label(false); ?>

					</div>
					<div class="col-sm-6">
				        <?= $form->field($searchModel, 'id_pemeriksaan_sub_rincian')->widget(DepDrop::className(), [
				            'type'=>DepDrop::TYPE_SELECT2,
		                    'options' => [
		                        'placeholder' => '- Pilih Sub Analisa -',
		                        'id' => 'pemeriksaan-sub-rincian'
		                    ],
				            'pluginOptions' => [
		                        'depends' => ['pemeriksaan-sub'],
		                        'placeholder' => '- Pilih Sub Analisa -',
		                        'url' => Url::to(['/registrasi/list-pemeriksaan-rincian','id_pemeriksaan_rincian' => $searchModel->id_pemeriksaan_sub_rincian]),
				                'initialize' => true,
				                'params'=>['pemeriksaan-sub-rincian']
				            ]
				        ])->label(false); ?>

					</div>					
					<div class="col-sm-2 text-left">
						<?= Html::submitButton('<i class="fa fa-check"></i> Cari Data', ['class' => 'btn btn-primary btn-flat pull-right btn-block']) ?>
					</div>
				</div>
			</div>
		</div>		
	</div>	
</div>
