<?php

namespace app\controllers;

use app\models\Blog;
use app\models\Review;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class OtzyvyController extends Controller
{

    /**
     * Lists all Blog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Review::find()->andWhere(['is_active' => 1])
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}