<?php

namespace app\controllers;

use Yii;
use app\models\PemeriksaanFisik;
use app\models\PemeriksaanFisikSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use app\components\Helper;
use kartik\mpdf\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

/**
 * PemeriksaanFisikController implements the CRUD actions for PemeriksaanFisik model.
 */
class PemeriksaanFisikController extends Controller
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
                        'actions' => ['index','view','create','update','delete', 'pdf'],
                        'allow' => true,
                        'roles' => ['@'],
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

    /**
     * Lists all PemeriksaanFisik models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PemeriksaanFisikSearch();
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
     * Displays a single PemeriksaanFisik model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PemeriksaanFisik model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PemeriksaanFisik();

        $referrer = Yii::$app->request->referrer;

        if ($model->load(Yii::$app->request->post())) {

            $referrer = $_POST['referrer'];

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
     * Updates an existing PemeriksaanFisik model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $referrer = Yii::$app->request->referrer;

        if ($model->load(Yii::$app->request->post())) {

            $referrer = $_POST['referrer'];

            $modelMata = $model->findOrCreatePemeriksaanFisikMata();
            $modelMata->load(Yii::$app->request->post());

            $modelTelinga = $model->findOrCreatePemeriksaanFisikTelinga();
            $modelTelinga->load(Yii::$app->request->post());

            $modelTimpani = $model->findOrCreatePemeriksaanFisikTimpani();
            $modelTimpani->load(Yii::$app->request->post());

            $modelHidung = $model->findOrCreatePemeriksaanFisikHidung();
            $modelHidung->load(Yii::$app->request->post());

            $modelLeher = $model->findOrCreatePemeriksaanFisikLeher();
            $modelLeher->load(Yii::$app->request->post());

            $modelMulut = $model->findOrCreatePemeriksaanFisikMulut();
            $modelMulut->load(Yii::$app->request->post());

            $modelThorax = $model->findOrCreatePemeriksaanFisikThorax();
            $modelThorax->load(Yii::$app->request->post());

            $modelAbdomen = $model->findOrCreatePemeriksaanFisikAbdomen();
            $modelAbdomen->load(Yii::$app->request->post());

            $modelManuferEkstremitas = $model->findOrCreatePemeriksaanFisikManuferEkstremitas();
            $modelManuferEkstremitas->load(Yii::$app->request->post());

            if($model->save() AND
                $modelMata->save() AND
                $modelTelinga->save() AND
                $modelTimpani->save() AND
                $modelHidung->save() AND
                $modelLeher->save() AND
                $modelMulut->save() AND
                $modelThorax->save() AND
                $modelAbdomen->save() AND
                $modelManuferEkstremitas->save()
            ) {

                $model->registrasi->updateKesimpulan();

                Yii::$app->session->setFlash('success','Data berhasil disimpan.');

                return $this->redirect([
                    'registrasi/view',
                    'id'=>$model->id_registrasi,'tab'=>'pemeriksaan-fisik'
                ]);
            }

            Yii::$app->session->setFlash('error','Data gagal disimpan. Silahkan periksa kembali isian Anda.');


        }

        return $this->render('update', [
            'model' => $model,
            'referrer'=>$referrer
        ]);

    }

    /**
     * Deletes an existing PemeriksaanFisik model.
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
     * Finds the PemeriksaanFisik model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PemeriksaanFisik the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PemeriksaanFisik::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
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
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->getColumnDimension('J')->setWidth(20);
        $sheet->getColumnDimension('K')->setWidth(20);
        $sheet->getColumnDimension('L')->setWidth(20);
        $sheet->getColumnDimension('M')->setWidth(20);
        $sheet->getColumnDimension('N')->setWidth(20);
        $sheet->getColumnDimension('O')->setWidth(20);
        $sheet->getColumnDimension('P')->setWidth(20);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Id Registrasi');
        $sheet->setCellValue('C3', 'Keluhan Utama');
        $sheet->setCellValue('D3', 'Riwayat Alergi');
        $sheet->setCellValue('E3', 'Riwayat Kesehatan Dulu');
        $sheet->setCellValue('F3', 'Riwayat Kesehatan Keluarga');
        $sheet->setCellValue('G3', 'Kebiasaan');
        $sheet->setCellValue('H3', 'Tekanan Darah');
        $sheet->setCellValue('I3', 'Tinggi Badan');
        $sheet->setCellValue('J3', 'Berat Badan');
        $sheet->setCellValue('K3', 'Golongan Darah');
        $sheet->setCellValue('L3', 'Buta Warna');
        $sheet->setCellValue('M3', 'Anamnesa');
        $sheet->setCellValue('N3', 'Nadi');
        $sheet->setCellValue('O3', 'Pernafasan');
        $sheet->setCellValue('P3', 'Suhu');

        $sheet->setCellValue('A1', 'Data PemeriksaanFisik');

        $sheet->mergeCells('A1:P1');

        $sheet->getStyle('A1:P3')->getFont()->setBold(true);
        $sheet->getStyle('A1:P3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $row = 3;
        $i=1;

        $searchModel = new PemeriksaanFisikSearch();

        foreach($searchModel->getQuerySearch($params)->all() as $data){
            $row++;
            $sheet->setCellValue('A' . $row, $i);
            $sheet->setCellValue('B' . $row, $data->id_registrasi);
            $sheet->setCellValue('C' . $row, $data->keluhan_utama);
            $sheet->setCellValue('D' . $row, $data->riwayat_alergi);
            $sheet->setCellValue('E' . $row, $data->riwayat_kesehatan_dulu);
            $sheet->setCellValue('F' . $row, $data->riwayat_kesehatan_keluarga);
            $sheet->setCellValue('G' . $row, $data->kebiasaan);
            $sheet->setCellValue('H' . $row, $data->tekanan_darah);
            $sheet->setCellValue('I' . $row, $data->tinggi_badan);
            $sheet->setCellValue('J' . $row, $data->berat_badan);
            $sheet->setCellValue('K' . $row, $data->golongan_darah);
            $sheet->setCellValue('L' . $row, $data->buta_warna);
            $sheet->setCellValue('M' . $row, $data->anamnesa);
            $sheet->setCellValue('N' . $row, $data->nadi);
            $sheet->setCellValue('O' . $row, $data->pernafasan);
            $sheet->setCellValue('P' . $row, $data->suhu);
            
            $i++;
        }

        $sheet->getStyle('A3:P' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D3:P' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('E3:P' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


        $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A3:P' . $row)->applyFromArray($setBorderArray);

        $filename = time() . '_Data-Excel.xlsx';
        $path = 'exports/' . $filename;
        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        return $this->redirect($path);
    }

    public function exportPdf($params)
    {
        $searchModel = new PemeriksaanFisikSearch();
        $searchModel = $searchModel->getQuerySearch($params)->all();
        
        $content = $this->renderPartial('/template/monitorlinen',['model' => $searchModel]);

        $cssInline = /*<<<CSS
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
CSS;*/

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
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
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

    public function actionPdf($id) {
         // get your HTML raw content without any layouts or scripts
        // $content = $this->renderPartial('_reportPdfView');
        $model = \app\models\PemeriksaanFisik::findOne($id);
        $content = $this->renderPartial('_reportPemeriksaanFisik', [
                     'model' => $model,
                     // etc...
                     ]);
        // $content .= $this->renderPartial('_reportPemeriksaanFisik', [
        //              'model' => PemeriksaanFisik::findOne(17),
        //              // etc...
        //              ]);
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'Pemeriksaan Fisik MCU'],
             // call mPDF methods on the fly
            'methods' => [ 
                // 'SetHeader'=>['Krajee Report Header'], 
                'SetFooter'=>[null],
            ]
        ]);

        $pdf->filename = date('YmdHis') . "_Pemeriksaan_Fisik.pdf";

        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }
}
