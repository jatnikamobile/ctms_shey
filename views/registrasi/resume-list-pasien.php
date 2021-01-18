<?php 

use app\models\Instansi;
use app\models\Pasien;
use app\models\Registrasi;
use app\models\User;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'action' => Url::current(),
    'method' => 'get',
]);

?>

<div class="box box-primary">
	<div class="box-header with-border">
		<div class="row">
			<div class="col-sm-6">
				<?= $form->field($searchModel, 'tanggal_awal')->widget(DatePicker::class, [
		                'value' => date('Y-m-d'),
		                'options' => ['placeholder' => 'Tanggal Awal'],
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
		                'options' => ['placeholder' => 'Tanggal Akhir'],
		                'pluginOptions' => [
		                    'autoclose'=>true,
		                    'allowClear' => true,
		                    'format' => 'yyyy-mm-dd'
		                ]
		        ])->label(false) ?>
			</div>

			<?php if (User::isInstansi()) { ?>
            	<div class="col-sm-12">
					<?= $form->field($searchModel, 'id_pasien_instansi')->widget(Select2::classname(), [
			            'data' =>  Instansi::getList(),
			            'options' => [
			              'placeholder' => '- Cari Instansi -',
			            ],
			            'pluginOptions' => [
			                'allowClear' => true,
			                'disabled' => true
			            ],
			        ])->label(false); ?>
				</div>
				<div class="col-sm-12">
					<?= $form->field($searchModel, 'pasien_id')->widget(Select2::classname(), [
			            'data' =>  Registrasi::getListPasienInstansi(),
			            'options' => [
			              'placeholder' => '- Cari Pasien -',
			            ],
			            'pluginOptions' => [
			                'allowClear' => true
			            ],
			        ])->label(false); ?>
				</div>
        	<?php } else { ?>
        		<div class="col-sm-12">
					<?= $form->field($searchModel, 'id_pasien_instansi')->widget(Select2::classname(), [
			            'data' =>  Instansi::getList(),
			            'options' => [
			              'placeholder' => '- Cari Instansi -',
			            ],
			            'pluginOptions' => [
			                'allowClear' => true
			            ],
			        ])->label(false); ?>
				</div>
				<div class="col-sm-12">
					<?= $form->field($searchModel, 'pasien_id')->widget(Select2::classname(), [
			            'data' =>  Registrasi::getList(),
			            'options' => [
			              'placeholder' => '- Cari Pasien -',
			            ],
			            'pluginOptions' => [
			                'allowClear' => true
			            ],
			        ])->label(false); ?>
				</div>
        	<?php } ?>
		</div>
		<?= Html::a('<i class="fa fa-list"></i> Daftar Pasien', ['resume-pasien'], ['class' => 'btn btn-warning btn-flat']); ?>
		<?= Html::submitButton('<i class="fa fa-check"></i> Cari Data', ['class' => 'btn btn-primary btn-flat pull-right']) ?>
	</div>

	<div class="box-body">
		<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
	        	[
	                'attribute' => 'no_mcu',
	                'label' => 'No ID Pasien',
	                'format' => 'raw',
	                'headerOptions' => ['style' => 'text-align:center; width: 65px'],
	                'contentOptions' => ['style' => 'text-align:center;'],
	            ],
	            [
	                'attribute' => 'nik_pasien',
	                'label' => 'NIK',
	                'format' => 'raw',
	                'headerOptions' => ['style' => 'text-align:center;'],
	                'contentOptions' => ['style' => 'text-align:center;'],
	            ],
	            [
	                'attribute' => 'nama_pasien',
	                'label' => 'Nama Pasien',
	                'format' => 'raw',
	                'headerOptions' => ['style' => 'text-align:center;'],
	                'contentOptions' => ['style' => 'text-align:center;'],
	            ],
	            [
	                'label' => '',
	                'format' => 'raw',
	                'value' => function($data) {
	                	return Html::a('<i class="fa fa-check"></i>', ['resume-pasien','id' => $data->id], ['option' => 'value']);
	                },
	                'headerOptions' => ['style' => 'text-align:center; width: 40px'],
	                'contentOptions' => ['style' => 'text-align:center;'],
	            ],
        	]
        ]); ?>
	</div>
</div>

<?php ActiveForm::end(); ?>