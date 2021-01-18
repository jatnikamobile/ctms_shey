<?php 
use kartik\date\DatePicker;
use kartik\select2\Select2;
use app\models\Instansi;
use app\models\Unit;
use app\models\Pendidikan;
use app\models\Agama;
use app\models\Pekerjaan;
use app\models\Wilayah;

?>
<div class="row">
    <div class="col-sm-12">
		<?= $form->field($model, 'nik_pasien',
			    [
			        'horizontalCssClasses' => [
			            'label' => 'col-sm-3',
			            'wrapper' => 'col-sm-7',
			            'error' => '',
			            'hint' => '',
			    ],
			])->textInput(['maxlength' => true,'readonly'=> true,'value'=> '01']) ?>
		
		<?= $form->field($model, 'tanggal',
			    [
			        'horizontalCssClasses' => [
			            'label' => 'col-sm-3',
			            'wrapper' => 'col-sm-7',
			            'error' => '',
			            'hint' => '',
			    ],
			])->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'nama_pasien',
			    [
			        'horizontalCssClasses' => [
			            'label' => 'col-sm-3',
			            'wrapper' => 'col-sm-7',
			            'error' => '',
			            'hint' => '',
			    ],
			])->textInput(['maxlength' => true]) ?>


		<?= $form->field($model, 'id_pasien_instansi',
		    [
		        'horizontalCssClasses' => [
		            'label' => 'col-sm-3',
		            'wrapper' => 'col-sm-7',
		            'error' => '',
		            'hint' => '',
		    ],
			])->widget(Select2::classname(), [
			    'data' =>  Instansi::getList(),
			    'options' => [
			      'placeholder' => '- Pilih Instansi -',
			    ],
			    'pluginOptions' => [
			        'allowClear' => true
			    ],
			]); ?>

		<?= $form->field($model, 'id_pasien_unit',
		    [
		        'horizontalCssClasses' => [
		            'label' => 'col-sm-3',
		            'wrapper' => 'col-sm-7',
		            'error' => '',
		            'hint' => '',
		    ],
			])->widget(Select2::classname(), [
			    'data' =>  Unit::getList(),
			    'options' => [
			      'placeholder' => '- Pilih Unit -',
			    ],
			    'pluginOptions' => [
			        'allowClear' => true
			    ],
			]); ?>
		<?= $form->field($model, 'tempat_lahir_pasien',
			    [
			        'horizontalCssClasses' => [
			            'label' => 'col-sm-3',
			            'wrapper' => 'col-sm-7',
			            'error' => '',
			            'hint' => '',
			    ],
			])->textInput(['maxlength' => true]) ?>
	</div>
</div>