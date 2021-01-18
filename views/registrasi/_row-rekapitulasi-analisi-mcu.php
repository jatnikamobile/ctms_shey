<?php
/**
 * Created by PhpStorm.
 * User: Zaenal Alim Prayoga
 * Date: 23/01/2019
 * Time: 00.12
 */
use app\models\PemeriksaanRincianPilihanSearch;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title"><i class="fa fa-list"></i> Rekapitulasi Hasil</h2>
            </div>
            <div class="box-body" style="height: 500px;overflow: auto;">
                <?php
                $pilihanSearchModel = new PemeriksaanRincianPilihanSearch();
                $pilihanSearchModel->id_pemeriksaan_sub_rincian = $searchModel->id_pemeriksaan_sub_rincian;
                $pilihanSearchModel->id_pemeriksaan_sub = $searchModel->id_pemeriksaan_sub;
                $pilihanSearchModel->id_pemeriksaan = $searchModel->id_pemeriksaan;

                $pilihanDataProvider = $pilihanSearchModel->searchAnalisisMcu(Yii::$app->request->queryParams);
                ?>

                <?= GridView::widget([
                    'dataProvider' => $pilihanDataProvider,
                    'filterModel' => $pilihanSearchModel,
                    'options' =>['id'=>'grid-rekap-hasil'],
                    'columns' => [
                        [
                            'class' => 'yii\grid\SerialColumn',
                            'header' => 'No',
                            'headerOptions' => ['style' => 'text-align:center; width: 55px'],
                            'contentOptions' => ['style' => 'text-align:center']
                        ],
                        [
                            'attribute' => 'nama',
                            'format' => 'raw',
                            'headerOptions' => ['style' => 'text-align:center;'],
                            'contentOptions' => ['style' => 'text-align:left;'],
                        ],
                        [
                            'label' => 'Hasil',
                            'value' => function($data) use ($searchModel) {
                                return $data->getCountRincianHasil($searchModel);
                            },
                            'format' => 'raw',
                            'headerOptions' => ['style' => 'text-align:center; width: 10px'],
                            'contentOptions' => ['style' => 'text-align:center; font-weight: bold'],
                        ],
                        [
                            'attribute' => '',
                            'format'    => 'raw',
                            'value'     => function($data) use ($searchModel){
                                $nama = str_replace(' ','_', $data->nama);
                                return Html::button('<i class="fa fa-eye"></i>', [
                                                        'id'                          => 'btn-show-rekap-pasien-'.$nama,
                                                        'class'                       => 'btn btn-outline-info',
                                                        'data-id_periksa'             => $searchModel->id_pemeriksaan,
                                                        'data-id_periksa_sub'         => $searchModel->id_pemeriksaan_sub,
                                                        'data-id_periksa_sub_rincian' => $searchModel->id_pemeriksaan_sub_rincian,
                                                        'data-jawaban'                => $data->nama,
                                                        'onclick'                     => 'show_rekap_pasien(this)',
                                                    ]);
                            },
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title"><i class="fa fa-list"></i> Rekapitulasi pasien</h2>
            </div>
            <div class="box-body" style="height: 500px;overflow: auto;">
               <div id="target-rekap-pasien"></div>
            </div>
        </div>
    </div>
</div>

<?php
$baseUrl = Yii::$app->request->baseUrl;
$sm = json_encode(Yii::$app->request->queryParams);
$script = <<< JS
    var link = "$baseUrl";
    function show_rekap_pasien(param){
        var key = $('#'+param.id).data('jawaban');
        var send = $sm;
        $.ajax({
            type:"POST",
            url:link+'/index.php?r=registrasi/pasien-analisis',
            data:{searchModel:send,key:key},
            beforeSend:function(){
                $("#target-rekap-pasien").html('<div class="alert alert-info" role="alert">Memuat Data ... <i class="fa fa-spinner fa-pulse"></i></div>');
            },
            success:function(resp){
                $("#target-rekap-pasien").html(resp);
            }
        });
    }
JS;

$this->registerJs($script, yii\web\View::POS_END);
?>