<?php

namespace app\controllers;

use app\models\DokumenProtokol;
use app\models\DokumenProtokolSearch;
use app\models\ProtokolUji;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\helpers\FileHelper;
use Yii;

class DokProtokolController extends Controller
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
     * Creates a new Registrasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DokumenProtokol();
        $referrer = Yii::$app->request->referrer;

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->save()) {
                $filename = $model->id . '_' . uniqid(time()) . '_' . $model->file->name;
                $directory = Yii::getAlias('@webroot/uploads/dok-protokol/');
                FileHelper::createDirectory($directory);

                if ($model->file->saveAs($directory . $filename)) {
                    $model->file_path = $filename;
                    $model->update(false);
                    return 'OK';
                }
            }
        }

        return $this->renderPartial('_form', [
            'model' => $model,
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
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->validate()) {
                $filename = $model->id . '_' . uniqid(time()) . '_' . $model->file->name;
                $directory = Yii::getAlias('@webroot/uploads/dok-protokol/');
                FileHelper::createDirectory($directory);

                if ($model->file->saveAs($directory . $filename)) {
                    $model->file_path = $filename;
                    $model->update(false);
                    return 'OK';
                }
            }
        }

        return $this->renderPartial('_form', [
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
        $id_protokol = $model->id_protokol;

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Data berhasil dihapus');
        } else {
            Yii::$app->session->setFlash('error', 'Data gagal dihapus');
        }

        return $this->redirect(Yii::$app->request->referrer . '#dokp');
    }

    /**
     * Finds the Registrasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DokumenProtokol
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DokumenProtokol::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
