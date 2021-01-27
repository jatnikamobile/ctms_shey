<?php

namespace app\controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use app\models\Pemeriksaan;
use app\models\PemeriksaanRincian;
use app\models\PemeriksaanRincianHasil;
use app\models\ProtokolUji;
use app\models\ProtokolUjiSearch;
use app\models\Registrasi;
use app\models\RegistrasiSearch;
use app\models\User;
use kartik\mpdf\Pdf;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use Yii;
use yii\data\ActiveDataProvider;

class ProtokolUjiController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [  
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','view','create','update','delete', 'pdf-formulir', 'pdf-label','resume-pasien', 'analisis-mcu','list-pemeriksaan-rincian','unduh-seluruh-pemeriksaan','pasien-analisis'],
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
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionResumePasien($id=null)
    {
        $searchModel = new RegistrasiSearch();
        $modelRegister = null;

        if (User::isInstansi()){
            $searchModel->id_pasien_instansi = Yii::$app->user->identity->id_instansi;
        }

        $modelPemeriksaanRincianHasil = new PemeriksaanRincianHasil();

        if ($id !== null) {
            $modelRegister = Registrasi::findOne($id);
            $searchModel->pasien_id = $modelRegister->id;
        }
        
        $dataProvider = $searchModel->searchResumeHasil(Yii::$app->request->queryParams);

        return $this->render('resume-pasien', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelRegister' => $modelRegister,
            'modelPemeriksaanRincianHasil' => $modelPemeriksaanRincianHasil 
        ]);
    }

     public function actionAnalisisMcu()
    {   
        $searchModel = new RegistrasiSearch();
        
        if (User::isInstansi()){
            $searchModel->id_pasien_instansi = Yii::$app->user->identity->id_instansi;
        }

        $dataProvider = $searchModel->searchAnalisisMcu(Yii::$app->request->queryParams);
        return $this->render('analisis-mcu', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionSubanalisa($id_pemeriksaan_sub = null) 
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $analisa = $parents[0];

                if($analisa=='2') return Json::encode(['output'=>[], 'selected'=>'']);

                $out = self::getListSubanalisa($analisa); 

                $selected = Pemeriksaan::findOne(['id_induk' => $analisa]);

                echo Json::encode(['output' => $out, 'selected' => $id_pemeriksaan_sub]);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionListPemeriksaanRincian($id_pemeriksaan_rincian = null) 
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $pemeriksaan = $parents[0];

                $out = self::getListPemeriksaanRincian($pemeriksaan); 

                echo Json::encode(['output' => $out, 'selected' => $id_pemeriksaan_rincian]);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }    

    public static function getListSubanalisa($analisa)
    {
        $list = [];
        foreach (Pemeriksaan::find()->andWhere(['id_induk' => $analisa])->all() as $subanalisa) {
            $list[] = [
                'id' => $subanalisa->id, 'name' => $subanalisa->nama
            ];
        }
        return $list;
    }

    public static function getListPemeriksaanRincian($pemeriksaan)
    {
        $list = [];
        $query = PemeriksaanRincian::find();
            $query
                ->andWhere(['id_pemeriksaan' => $pemeriksaan])
                ->andWhere(['rincian_jenis' => PemeriksaanRincian::PILIHAN]);

        foreach ($query->all() as $subanalisa) {
            $list[] = [
                'id' => $subanalisa->id, 'name' => $subanalisa->nama
            ];
        }
        return $list;
    }

    public function actionPasienAnalisis()
    {
        $searchModel = new RegistrasiSearch();
        if($searchModel->load(Yii::$app->request->post('searchModel'))) {
            $searchModel->hasil = Yii::$app->request->post('key');
        }
        $dataProvider = $searchModel->getRincianHasil($searchModel);
        return $this->renderAjax('_grid-rekap-pasien', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Lists all Registrasi models.
     * @return mixed
     */
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

                $modelPemeriksaanRincianHasil->setDokter();
                $modelPemeriksaanRincianHasil->setPemeriksa();

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
            'modelPemeriksaanRincianHasil' => $modelPemeriksaanRincianHasil,
            'dpDoks' => new ActiveDataProvider(['query' => $model->getManyDokumen()]),
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
            // $referrer = $_POST['referrer'];

            // if ($model->pasien_id == null) {
            //     $model->generatePasien();
            //     $model->pasien_id = $model->setPasienId();
            // }
            // elseif ($model->pasien_id != null ) {
            //     $model->generateUbahPasien($model->pasien_id);
            // }

            if($model->save()) {
                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect(['view', 'id' => $model->id]);
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
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if($model->save()) {
                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect(['view', 'id' => $model->id]);
            }

            Yii::$app->session->setFlash('error','Data gagal disimpan. Silahkan periksa kembali isian Anda.');
        }

        return $this->render('update', [
            'model' => $model,
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
     * @return ProtokolUji the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProtokolUji::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUnduhSeluruhPemeriksaan($id)
    {
        $model = $this->findModel($id);

        $content = $this->renderPartial('_unduh-seluruh-pemeriksaan-pdf',['model' => $model]);

        $cssInline = <<<CSS
        table {
            *border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            font-size: 14px;
        }
        td, th {
            padding: 4px;
            /*border: 1px solid #0000;*/
        }
        .text-center {
            text-align: center;
        }
CSS;

        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            'marginLeft' => 10,
            'marginRight' => 10,
            // A4 paper format
            'format' => Pdf::FORMAT_LEGAL,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => $cssInline,
             // set mPDF properties on the fly
            'options' => ['title' => 'Seluruh Pemeriksaan'],
             // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=> [null],
                'SetFooter'=> [null],
            ]
        ]);

        $date = date('Y-m-d H:i:s');

        $pdf->filename = "Hasil Seluruh Pemeriksaan  - ".$date.".pdf";

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function exportExcel($params)
    {
        $spreadsheet = new Spreadsheet();
        
        $spreadsheet->setActiveSheetIndex(0);
        
        $sheet = $spreadsheet->getActiveSheet();
        
        $setBorderArray = array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
        );


        $sheet->getColumnDimension('A')->setWidth(10);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Paket ID');
        $sheet->setCellValue('C3', 'Pasien ID');
        $sheet->setCellValue('D3', 'Instansi ID');
        $sheet->setCellValue('E3', 'Unit ID');
        $sheet->setCellValue('F3', 'Tanggal');

        $sheet->setCellValue('A1', 'Data Registrasi');

        $sheet->mergeCells('A1:F1');

        $sheet->getStyle('A1:F3')->getFont()->setBold(true);
        $sheet->getStyle('A1:F3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $row = 3;
        $i=1;

        $searchModel = new RegistrasiSearch();

        foreach($searchModel->getQuerySearch($params)->all() as $data){
            $row++;
            $sheet->setCellValue('A' . $row, $i);
            $sheet->setCellValue('B' . $row, $data->paket_id);
            $sheet->setCellValue('C' . $row, $data->pasien_id);
            $sheet->setCellValue('D' . $row, $data->instansi_id);
            $sheet->setCellValue('E' . $row, $data->unit_id);
            $sheet->setCellValue('F' . $row, $data->tanggal);
            
            $i++;
        }

        $sheet->getStyle('A3:F' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D3:F' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('E3:F' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


        $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A3:F' . $row)->applyFromArray($setBorderArray);

        $filename = time() . '_Data-Excel.xlsx';
        $path = 'exports/' . $filename;
        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        return $this->redirect($path);
    }

    public function exportPdf($params)
    {
        $searchModel = new RegistrasiSearch();
        $searchModel = $searchModel->getQuerySearch($params)->all();
        
        $content = $this->renderPartial('_reportPdfView',['model' => $searchModel]);

        $cssInline = <<<CSS
        table {
            *border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }
        .table-pdf td, .table-pdf th {
            padding: 10px;
            border: 1px solid #0000;
            text-align: center;
        }
        .table-pdf th {
            border: 1px solid #0000;
            background-color: #eee;
            text-align: center;
        }
CSS;

        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            'marginLeft' => 10,
            'marginRight' => 10,
            // A4 paper format
            'format' => Pdf::FORMAT_LEGAL,
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => $cssInline,
             // set mPDF properties on the fly
            'options' => ['title' => 'Linen - Supervisi Outsourcing'],
             // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=> [null],
                'SetFooter'=> [null],
            ]
        ]);

        $date = date('Y-m-d His');

        $pdf->filename = "Monitoring  - ".$date.".pdf";

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionPdfLabel($id) {
        // get your HTML raw content without any layouts or scripts
        // $content = $this->renderPartial('_reportPdfView');
        $model = $this->findModel($id);

        $content = $this->renderPartial('_labelPdf', ['model' => $model]);

        $cssInline = <<<CSS
        table {
            *border-collapse: collapse;
            border-spacing: 0;
            border: 1px solid; 
            width:180px; 
            font-size: 10px;
        }
        td {
            padding: 1px;
        }
CSS;
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            'marginLeft' => 10,
            'marginRight' => 10, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => $cssInline, 
             // set mPDF properties on the fly
            'options' => ['title' => 'Label MCU'],
             // call mPDF methods on the fly
            'methods' => [ 
                // 'SetHeader'=>['Krajee Report Header'], 
                'SetFooter'=>[null],
            ]
        ]);

        $pdf->filename = date('YmdHis') . "_Label_MCU.pdf";

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

}
