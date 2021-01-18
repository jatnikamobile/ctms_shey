<?php

namespace app\controllers;

use Yii;
use app\models\PemeriksaanTreadmill;
use app\models\PemeriksaanTreadmillSearch;
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
 * PemeriksaanTreadmillController implements the CRUD actions for PemeriksaanTreadmill model.
 */
class PemeriksaanTreadmillController extends Controller
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
     * Lists all PemeriksaanTreadmill models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PemeriksaanTreadmillSearch();
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
     * Displays a single PemeriksaanTreadmill model.
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
     * Creates a new PemeriksaanTreadmill model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PemeriksaanTreadmill();

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
     * Updates an existing PemeriksaanTreadmill model.
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

            if($model->save())
            {
                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect($referrer);
            }

            Yii::$app->session->setFlash('error','Data gagal disimpan. Silahkan periksa kembali isian Anda.');


        }

        return $this->render('update', [
            'model' => $model,
            'referrer'=>$referrer
        ]);

    }

    /**
     * Deletes an existing PemeriksaanTreadmill model.
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
     * Finds the PemeriksaanTreadmill model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PemeriksaanTreadmill the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PemeriksaanTreadmill::findOne($id)) !== null) {
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
        $sheet->getColumnDimension('Q')->setWidth(20);
        $sheet->getColumnDimension('R')->setWidth(20);
        $sheet->getColumnDimension('S')->setWidth(20);
        $sheet->getColumnDimension('T')->setWidth(20);
        $sheet->getColumnDimension('U')->setWidth(20);
        $sheet->getColumnDimension('V')->setWidth(20);

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Id Registrasi');
        $sheet->setCellValue('C3', 'Metode');
        $sheet->setCellValue('D3', 'Jantung');
        $sheet->setCellValue('E3', 'Kf Poor');
        $sheet->setCellValue('F3', 'Kf Fair');
        $sheet->setCellValue('G3', 'Kf Average');
        $sheet->setCellValue('H3', 'Kf Good');
        $sheet->setCellValue('I3', 'Kf Excelent');
        $sheet->setCellValue('J3', 'Klasifikasi Fungsional 1');
        $sheet->setCellValue('K3', 'Klasifikasi Fungsional 2');
        $sheet->setCellValue('L3', 'Klasifikasi Fungsional 3');
        $sheet->setCellValue('M3', 'Denyut Nadi Awal');
        $sheet->setCellValue('N3', 'Denyut Nadi Akhir');
        $sheet->setCellValue('O3', 'Td Sistolik Awal');
        $sheet->setCellValue('P3', 'Td Diastolik Awal');
        $sheet->setCellValue('Q3', 'Td Sistolik Akhir');
        $sheet->setCellValue('R3', 'Td Diastolik Akhir');
        $sheet->setCellValue('S3', 'Stop Treadmill');
        $sheet->setCellValue('T3', 'Resume Hasil');
        $sheet->setCellValue('U3', 'Max');
        $sheet->setCellValue('V3', 'Submax');

        $sheet->setCellValue('A1', 'Data PemeriksaanTreadmill');

        $sheet->mergeCells('A1:V1');

        $sheet->getStyle('A1:V3')->getFont()->setBold(true);
        $sheet->getStyle('A1:V3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $row = 3;
        $i=1;

        $searchModel = new PemeriksaanTreadmillSearch();

        foreach($searchModel->getQuerySearch($params)->all() as $data){
            $row++;
            $sheet->setCellValue('A' . $row, $i);
            $sheet->setCellValue('B' . $row, $data->id_registrasi);
            $sheet->setCellValue('C' . $row, $data->metode);
            $sheet->setCellValue('D' . $row, $data->jantung);
            $sheet->setCellValue('E' . $row, $data->kf_poor);
            $sheet->setCellValue('F' . $row, $data->kf_fair);
            $sheet->setCellValue('G' . $row, $data->kf_average);
            $sheet->setCellValue('H' . $row, $data->kf_good);
            $sheet->setCellValue('I' . $row, $data->kf_excelent);
            $sheet->setCellValue('J' . $row, $data->klasifikasi_fungsional_1);
            $sheet->setCellValue('K' . $row, $data->klasifikasi_fungsional_2);
            $sheet->setCellValue('L' . $row, $data->klasifikasi_fungsional_3);
            $sheet->setCellValue('M' . $row, $data->denyut_nadi_awal);
            $sheet->setCellValue('N' . $row, $data->denyut_nadi_akhir);
            $sheet->setCellValue('O' . $row, $data->td_sistolik_awal);
            $sheet->setCellValue('P' . $row, $data->td_diastolik_awal);
            $sheet->setCellValue('Q' . $row, $data->td_sistolik_akhir);
            $sheet->setCellValue('R' . $row, $data->td_diastolik_akhir);
            $sheet->setCellValue('S' . $row, $data->stop_treadmill);
            $sheet->setCellValue('T' . $row, $data->resume_hasil);
            $sheet->setCellValue('U' . $row, $data->max);
            $sheet->setCellValue('V' . $row, $data->submax);
            
            $i++;
        }

        $sheet->getStyle('A3:V' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('D3:V' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('E3:V' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);


        $sheet->getStyle('C' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('A3:V' . $row)->applyFromArray($setBorderArray);

        $filename = time() . '_Data-Excel.xlsx';
        $path = 'exports/' . $filename;
        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        return $this->redirect($path);
    }

    public function exportPdf($params)
    {
        $searchModel = new PemeriksaanTreadmillSearch();
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
        $model = \app\models\PemeriksaanTreadmill::findOne($id);
        $content = $this->renderPartial('_reportPemeriksaanTreadmill', [
                     'model' => $model,
                     // etc...
                     ]);       
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
            // 'options' => ['title' => 'Krajee Report Title'],
             // call mPDF methods on the fly
            'methods' => [ 
                // 'SetHeader'=>['Krajee Report Header'], 
                'SetFooter'=>[null],
            ]
        ]);

        $pdf->filename = date('YmdHis') . "_Pemeriksaan_Treadmill.pdf";

        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }
}
