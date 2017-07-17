<?php

namespace backend\controllers;

use common\models\PageAbout;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class PageaboutController extends BaseController
{
    public $bread = 'Cтраница о нас';
    public $not_found = 'Страница не найдена';
    public $title_edit = 'Редактирование';
    public $title_index = 'Cтраница о нас';

    public function actionIndex()
    {
        $model = PageAbout::findOne(1);
        if (!$model) {
            throw new NotFoundHttpException($this->not_found);
        }

        $this->view->title = $this->title_index;
        $this->view->params['breadcrumbs'][] = $this->view->title;

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        $model = PageAbout::findOne(1);
        if (!$model) {
            throw new NotFoundHttpException($this->not_found);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                $model['upload_image'] = UploadedFile::getInstance($model, 'upload_image');
                if ($model['upload_image']) {
                    $image_id = $model->upload();
                    $model = PageAbout::findOne(1);
                    $model['image_id'] = $image_id;
                    $model->save();
                }
                $model['upload_team_1'] = UploadedFile::getInstance($model, 'upload_team_1');
                if ($model['upload_team_1']) {
                    $image_id = $model->upload1();
                    $model = PageAbout::findOne(1);
                    $model['team_1'] = $image_id;
                    $model->save();
                }
                $model['upload_team_2'] = UploadedFile::getInstance($model, 'upload_team_2');
                if ($model['upload_team_2']) {
                    $image_id = $model->upload2();
                    $model = PageAbout::findOne(1);
                    $model['team_2'] = $image_id;
                    $model->save();
                }
                $model['upload_team_3'] = UploadedFile::getInstance($model, 'upload_team_3');
                if ($model['upload_team_3']) {
                    $image_id = $model->upload3();
                    $model = PageAbout::findOne(1);
                    $model['team_3'] = $image_id;
                    $model->save();
                }
                $model['upload_team_4'] = UploadedFile::getInstance($model, 'upload_team_4');
                if ($model['upload_team_4']) {
                    $image_id = $model->upload4();
                    $model = PageAbout::findOne(1);
                    $model['team_4'] = $image_id;
                    $model->save();
                }
                Yii::$app->session->setFlash('success', $this->saved);
                return $this->redirect(['update', 'id' => $model->primaryKey]);
            }
        }

        $this->view->title = $this->title_edit;
        $this->view->params['breadcrumbs'][] = ['label' => $this->bread, 'url' => ['index']];
        $this->view->params['breadcrumbs'][] = $this->view->title;

        return $this->render('form', [
            'model' => $model,
        ]);
    }

    public function actionImage($id)
    {
        $model = PageAbout::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException($this->not_found);
        }
        $model['image_id'] = 0;
        $model->save();

        return $this->redirect(['update', 'id' => $model->primaryKey]);
    }

    public function actionTeam1($id)
    {
        $model = PageAbout::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException($this->not_found);
        }
        $model['team_1'] = 0;
        $model->save();

        return $this->redirect(['update', 'id' => $model->primaryKey]);
    }

    public function actionTeam2($id)
    {
        $model = PageAbout::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException($this->not_found);
        }
        $model['team_2'] = 0;
        $model->save();

        return $this->redirect(['update', 'id' => $model->primaryKey]);
    }

    public function actionTeam3($id)
    {
        $model = PageAbout::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException($this->not_found);
        }
        $model['team_3'] = 0;
        $model->save();

        return $this->redirect(['update', 'id' => $model->primaryKey]);
    }

    public function actionTeam4($id)
    {
        $model = PageAbout::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException($this->not_found);
        }
        $model['team_4'] = 0;
        $model->save();

        return $this->redirect(['update', 'id' => $model->primaryKey]);
    }
}
