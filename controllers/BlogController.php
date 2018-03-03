<?php

namespace app\controllers;

use app\models\Blog;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class BlogController extends Controller
{

    /**
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Blog::find()->andWhere(['is_active' => 1]),
            'pagination' => [
                'pageSize' => 1
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}