<?php 
use app\models\User;

$this->title = 'Resume Hasil SWAB';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-sm-4">
		<?php /*if (User::isAdmin()) {
                echo $this->render('resume-list-pasien-admin',[
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider
				]);
            }
            else if (User::isInstansi()) {
                echo $this->render('resume-list-pasien-instansi',[
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
					'id_instansi' => 
				]);
            }*/
        echo $this->render('resume-list-pasien',[
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider
				]);
       	?>
	</div>

	<div class="col-sm-8">
		<?= $this->render('resume-detail-pasien',[
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'modelRegister' => $modelRegister,
			'modelPemeriksaanRincianHasil' => $modelPemeriksaanRincianHasil
		]) ?>
	</div>
</div>