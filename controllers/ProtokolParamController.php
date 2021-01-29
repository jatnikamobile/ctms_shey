<?php

namespace app\controllers;

use app\models\PemeriksaanRincian;
use app\models\PemeriksaanRincianHasil;
use app\models\ProtokolUji;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;
use yii\web\UploadedFile;

class ProtokolParamController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [  
                'class' => AccessControl::class,
                'rules' => [
                    [
                        // 'actions' => ['index','view','create','update','delete', 'pdf-formulir', 'pdf-label','resume-pasien', 'analisis-mcu','list-pemeriksaan-rincian','unduh-seluruh-pemeriksaan','pasien-analisis'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['subanalisa'],
                        'allow' => true,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new ProtokolUjiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->get('export')) {
            return $this->exportExcel(Yii::$app->request->queryParams);
        }

        if (Yii::$app->request->get('export-pdf')) {
            return $this->exportPdf(Yii::$app->request->queryParams);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Registrasi model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $modelPemeriksaanRincianHasil = new PemeriksaanRincianHasil();
        $modelPemeriksaanRincianHasil->id_registrasi = $model->id;
        

        if ($modelPemeriksaanRincianHasil->load(Yii::$app->request->post())) {
            if ($modelPemeriksaanRincianHasil->file !== null) {
                // Membuat array untuk menampung id_pemeriksaan_rincian pada fileInput Lampiran
                foreach ($modelPemeriksaanRincianHasil->file as $key => $value) {
                    $arrayFile[] = $key;
                }

                // $modelPemeriksaanRincianHasil->setDokter();
                // $modelPemeriksaanRincianHasil->setPemeriksa();

                // Membuat Objek UploadFile pada attribute $file
                $modelPemeriksaanRincianHasil->file = UploadedFile::getInstances($modelPemeriksaanRincianHasil, 'file');

                // Upload Lampiran 
                $modelPemeriksaanRincianHasil->uploadLampiran($model->id, $arrayFile);
            }
            
            // Save / Update Pemeriksaan (Melakukan Pengecekan Apakah Pemeriksaan Rincian Hasil Sudah Diisi Atau Belum)
            $modelPemeriksaanRincianHasil->savePemeriksaanRincianHasil($model->id, Yii::$app->request->post('pilihan'));

            Yii::$app->session->setFlash('success','Data Pemeriksaan Berhasil Disimpan');
            
            return $this->refresh();
        }

        return $this->render('view', [
            'model' => $model,
            'modelPemeriksaanRincianHasil' => $modelPemeriksaanRincianHasil 
        ]);
    }

    /**
     * Creates a new Registrasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pasien_id = null)
    {
        $model = new ProtokolUji();
        $referrer = Yii::$app->request->referrer;

        if ($model->load(Yii::$app->request->post())) {
            // $model->no_urut = $model->setNomorUrut($model->id_pasien_instansi);
            // $model->no_registrasi = $model->setNomorRegistrasi();
            // $model->no_mcu = $model->instansi->kode.sprintf("%04s", $model->setNomorMcu($model->id_pasien_instansi));
            $referrer = $_POST['referrer'];

            // if ($model->pasien_id == null) {
            //     $model->generatePasien();
            //     $model->pasien_id = $model->setPasienId();
            // }
            // elseif ($model->pasien_id != null ) {
            //     $model->generateUbahPasien($model->pasien_id);
            // }

            if($model->save()) {

                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect($referrer);
            }

            Yii::$app->session->setFlash('error','Data gagal disimpan. Silahkan periksa kembali isian Anda.');

        }

        return $this->render('create', [
            'model' => $model,
            'referrer'=>$referrer
        ]);

    }

    /**
     * Updates an existing Registrasi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($protokol_id)
    {
        $model = ProtokolUji::findOne($protokol_id);
        if (empty($model)) {
            throw new NotFoundHttpException('Protokol tidak ada');
        }

        // $model = $this->findModel($id);

        // if ($model->load(Yii::$app->request->post())) {
        //     if($model->save()) {
        //         Yii::$app->session->setFlash('success','Data berhasil disimpan.');
        //         return $this->redirect($_POST['referrer']);
        //     }

        //     Yii::$app->session->setFlash('error','Data gagal disimpan. Silahkan periksa kembali isian Anda.');
        // }
        // $modelPemeriksaanRincianHasil->id_registrasi = $model->id;
        
        
        if (Yii::$app->request->isPost) {
            $modelPemeriksaanRincianHasil = new PemeriksaanRincianHasil();
            // if (Yii::$app->request->contentType) {
                // Membuat array untuk menampung id_pemeriksaan_rincian pada fileInput Lampiran
                // foreach ($modelPemeriksaanRincianHasil->file as $key => $value) {
                //     $arrayFile[] = $key;
                // }

                // $modelPemeriksaanRincianHasil->setDokter();
                // $modelPemeriksaanRincianHasil->setPemeriksa();

                // Membuat Objek UploadFile pada attribute $file
            $files = UploadedFile::getInstances($modelPemeriksaanRincianHasil, 'file');
            // Upload Lampiran
            $modelPemeriksaanRincianHasil->uploadLampiran($model->id, $files);
            
            // Save / Update Pemeriksaan (Melakukan Pengecekan Apakah Pemeriksaan Rincian Hasil Sudah Diisi Atau Belum)
            $modelPemeriksaanRincianHasil->savePemeriksaanRincianHasil($model->id, Yii::$app->request->post('pilihan'));
            
            Yii::$app->session->setFlash('success','Data Pemeriksaan Berhasil Disimpan');
            
            return $this->refresh();
        }

        return $this->render('_form', [
            // 'protokol' => $protokol,
            'model' => $model,
            // 'modelPemeriksaanRincianHasil' => $modelPemeriksaanRincianHasil,
        ]);
    }

    /**
     * Deletes an existing Registrasi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if($model->delete()) {
            Yii::$app->session->setFlash('success','Data berhasil dihapus');
        } else {
            Yii::$app->session->setFlash('error','Data gagal dihapus');
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Registrasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Registrasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProtokolUji::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
