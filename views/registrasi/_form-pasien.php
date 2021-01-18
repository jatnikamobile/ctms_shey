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
    <div class="col-sm-4">
		<?= $form->field($model, 'nik_pasien',
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

		<?= $form->field($model, 'alamat_pasien',
			    [
			        'horizontalCssClasses' => [
			            'label' => 'col-sm-3',
			            'wrapper' => 'col-sm-7',
			            'error' => '',
			            'hint' => '',
			    ],
			])->textArea(['rows' => 6]) ?>

		<?= $form->field($model, 'no_telepon_pasien',
			    [
			        'horizontalCssClasses' => [
			            'label' => 'col-sm-3',
			            'wrapper' => 'col-sm-7',
			            'error' => '',
			            'hint' => '',
			    ],
			])->textInput(['maxlength' => true]) ?>

	</div>
	<div class="col-sm-4">
		<?= $form->field($model, 'status_kawin_pasien',
			    [
			        'horizontalCssClasses' => [
			            'label' => 'col-sm-3',
			            'wrapper' => 'col-sm-7',
			            'error' => '',
			            'hint' => '',
			    ],
			])->dropDownList(
			    [ 
			        'kawin' => 'Kawin', 
			        'belum kawin' => 'Belum Kawin', 
			        'duda' => 'Duda',
			        'janda' => 'Janda',
			        'dibawahumur' => 'Dibawah Umur',
			    ], 
		    ['prompt' => '- Pilih Status Kawin -']) ?>

		<?= $form->field($model, 'tempat_lahir_pasien',
			    [
			        'horizontalCssClasses' => [
			            'label' => 'col-sm-3',
			            'wrapper' => 'col-sm-7',
			            'error' => '',
			            'hint' => '',
			    ],
			])->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'tanggal_lahir_pasien',
			    [
			        'horizontalCssClasses' => [
			            'label' => 'col-sm-3',
			            'wrapper' => 'col-sm-7',
			            'error' => '',
			            'hint' => '',
			    ],
			])->widget(DatePicker::class, 
			    [
			        'removeButton' => false,
			        'value' => date('Y-m-d'),
			        'options' => ['placeholder' => 'Tanggal'],
			        'pluginOptions' => [
			            'autoclose'=>true,
			            'format' => 'yyyy-mm-dd'
			    ]
		]) ?>

		<?= $form->field($model, 'jenis_kelamin_pasien',
			    [
			        'horizontalCssClasses' => [
			            'label' => 'col-sm-3',
			            'wrapper' => 'col-sm-7',
			            'error' => '',
			            'hint' => '',
			    ],
			])->dropDownList(
			    [
			     'Laki-Laki' => 'Laki-Laki', 
			     'Perempuan' => 'Perempuan', 
			    ], 
		    ['prompt' => '- Pilih Jenis Kelamin -']) ?>

		<?= $form->field($model, 'golongan_darah_pasien',
			    [
			        'horizontalCssClasses' => [
			            'label' => 'col-sm-3',
			            'wrapper' => 'col-sm-7',
			            'error' => '',
			            'hint' => '',
			    ],
			])->dropDownList(
		    	[ 'A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O', ], 
		    ['prompt' => '- Pilih Golongan Darah -']) ?>

		
	</div>
	<div class="col-sm-4">
		<?= $form->field($model, 'id_pasien_agama',
		    [
		        'horizontalCssClasses' => [
		            'label' => 'col-sm-3',
		            'wrapper' => 'col-sm-7',
		            'error' => '',
		            'hint' => '',
		    ],
			])->widget(Select2::classname(), [
			    'data' =>  Agama::getList(),
			    'options' => [
			      'placeholder' => '- Pilih Agama -',
			    ],
			    'pluginOptions' => [
			        'allowClear' => true
			    ],
			]); ?>

		<?= $form->field($model, 'id_pasien_pekerjaan',
		    [
		        'horizontalCssClasses' => [
		            'label' => 'col-sm-3',
		            'wrapper' => 'col-sm-7',
		            'error' => '',
		            'hint' => '',
		    ],
			])->widget(Select2::classname(), [
			    'data' =>  Pekerjaan::getList(),
			    'options' => [
			      'placeholder' => '- Pilih Pekerjaan -',
			    ],
			    'pluginOptions' => [
			        'allowClear' => true
			    ],
			]); ?>

		<?= $form->field($model, 'id_pasien_pendidikan',
		    [
		        'horizontalCssClasses' => [
		            'label' => 'col-sm-3',
		            'wrapper' => 'col-sm-7',
		            'error' => '',
		            'hint' => '',
		    ],
			])->widget(Select2::classname(), [
			    'data' =>  Pendidikan::getList(),
			    'options' => [
			      'placeholder' => '- Pilih Pendidikan -',
			    ],
			    'pluginOptions' => [
			        'allowClear' => true
			    ],
			]); ?>

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
	</div>
</div>