<?php

namespace frontend\controllers;

use abdualiym\cms\entities\ArticleCategories;
use abdualiym\cms\entities\Articles;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BlogController extends Controller
{

    public function actionIndex($slug)
    {
        $category = ArticleCategories::findOne(['slug' => $slug]);

        return $this->render('index', [
            'category' => $category,
            'dataProvider' => new ActiveDataProvider([
                'query' => Articles::find()->where(['category_id' => $category->id])->orderBy('date DESC')
            ]),
        ]);
    }

    public function actionView($slug)
    {
        if (!$article = Articles::findOne(['slug' => $slug])) {
            throw new NotFoundHttpException('Sahifa mavjud emas.', 404);
        }

        return $this->render('view', [
            'article' => $article,
            'related' => Articles::find()->where(['category_id' => $article->category_id])->andWhere(['!=', 'id', $article->id])->orderBy('date DESC')->limit(2)->all()
        ]);
    }

}
