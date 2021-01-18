<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use app\models\Pemeriksaan;
use app\models\Pasien;
use yii\grid\GridView;

$this->title = 'Analisis Hasil Uji';
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin([
    'action' => Url::current(),
    'method' => 'get',
]);

?>
<?= $this->render('analisis-filter',[
	'searchModel' => $searchModel,
	'form' => $form,
	'dataProvider' => $dataProvider
	
]) ?>

<?= $this->render('_grafik-mcu',[
	'searchModel' => $searchModel,
	'form' => $form,	
]) ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?= $this->render('_row-rekapitulasi-analisi-mcu',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'form' => $form,
		]) ?>
    </div>
	<!--<div class="col-sm-5">
		<?/*= $this->render('_grid-rekap-pemeriksaan',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'form' => $form,
		]) */?>
	</div>
	<div class="col-sm-7">
		<?/*= $this->render('_grid-rekap-pasien',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'form' => $form,
		]) */?>
	</div>-->
</div>


<?php ActiveForm::end(); ?>


