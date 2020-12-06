<?php

namespace backend\controllers;

use backend\models\PhotosForm;
use Yii;
use backend\models\Trees;
use backend\models\TreesSearch;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TreesController implements the CRUD actions for Trees model.
 */
class TreesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Trees models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TreesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trees model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        $photosForm = new PhotosForm();
        if ($photosForm->load(Yii::$app->request->post()) && $photosForm->validate()) {
//            VarDumper::dump($photosForm,12,true);die;
            try {
//                VarDumper::dump($photosForm->getErrors(),12,true);die;
                $this->addPhotos($model->id, $photosForm);
                return $this->redirect(['view', 'id' => $model->id]);
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }

        return $this->render('view', [
            'model' => $model,
            'photosForm' => $photosForm,
        ]);
    }

    public function addPhotos($id, PhotosForm $form)
    {
        $model = $this->get($id);
        foreach ($form->files as $file) {
            $model->addPhoto($file);
        }
//        VarDumper::dump($model->hasErrors(), 12, true);die;

        if (!$model->save()) {
            throw new \RuntimeException('Saving error.');
        }
    }

    /**
     * Creates a new Trees model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trees();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trees model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Trees model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionDeletePhoto($id, $photo_id)
    {
        try {
            $this->removePhoto($id, $photo_id);
        } catch (\DomainException $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['view', 'id' => $id, '#' => 'photos']);
    }

    /**
     * @param integer $id
     * @param $photo_id
     * @return mixed
     */
    public function actionMovePhotoUp($id, $photo_id)
    {
        $this->movePhotoUp($id, $photo_id);
        return $this->redirect(['view', 'id' => $id, '#' => 'photos']);
    }

    /**
     * @param integer $id
     * @param $photo_id
     * @return mixed
     */
    public function actionMovePhotoDown($id, $photo_id)
    {
        $this->movePhotoDown($id, $photo_id);
    }

        /**
     * Finds the Trees model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Trees the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trees::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function get($id): Trees
    {
        if (!$model = Trees::findOne($id)) {
            throw new \DomainException('Product is not found.');
        }
        return $model;
    }

    public function movePhotoUp($id, $photoId): void
    {
        $model = $this->get($id);
        $model->movePhotoUp($photoId);
        $model->save();
    }

    public function movePhotoDown($id, $photoId): void
    {
        $model = $this->get($id);
        $model->movePhotoDown($photoId);
        $model->save();
    }

    public function removePhoto($id, $photoId): void
    {
        $model = $this->get($id);
        $model->removePhoto($photoId);
        $model->save();
    }
}
