<?php

use app\models\User;
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Url;
use app\models\Registrasi;
use app\models\Pasien;
use app\models\Instansi;
use app\models\Unit;

/* @var $this yii\web\View */

$this->title = 'Dashboard CTMS Klinik Pejaten';
?>
<?php if(User::isAdmin()):?>
<div class="box box-primary">
    <div class ="box-body">  
        <div class="row">
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <p>Subject</p>

                        <h3><?= Yii::$app->formatter->asInteger(Registrasi::getCount()); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bars"></i>
                    </div>
                    <a href="<?=Url::to(['registrasi/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <p>Protokol</p>

                        <h3><?= Yii::$app->formatter->asInteger(Pasien::getCount()); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?=Url::to(['pasien/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <p>Enrolment</p>

                        <h3><?= Yii::$app->formatter->asInteger(Instansi::getCount()); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-building"></i>
                    </div>
                    <a href="<?=Url::to(['instansi/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <p>Sponsor</p>

                        <h3><?= Yii::$app->formatter->asInteger(Unit::getCount()); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bars"></i>
                    </div>
                    <a href="<?=Url::to(['unit/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<?php if(User::isInstansi()):?>
<div class="box box-primary">
    <div class ="box-body">  
        <div class="row">
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <p>Jumlah Registrasi</p>

                        <h3><?= Yii::$app->formatter->asInteger(Registrasi::getCountByInstansi(Yii::$app->user->identity->id_instansi)); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bars"></i>
                    </div>
                    <!-- <a href="<?=Url::to(['registrasi/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <p>Jumlah Pasien</p>

                        <h3><?= Yii::$app->formatter->asInteger(Pasien::getCountByInstansi(Yii::$app->user->identity->id_instansi)); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <!-- <a href="<?=Url::to(['pasien/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <p>Jumlah Unit</p>

                        <h3><?= Yii::$app->formatter->asInteger(Unit::getCountByInstansi(Yii::$app->user->identity->id_instansi)); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bars"></i>
                    </div>
                    <!-- <a href="<?=Url::to(['unit/index']);?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
