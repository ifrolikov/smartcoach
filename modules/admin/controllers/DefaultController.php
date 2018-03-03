<?php

namespace app\modules\admin\controllers;

use app\builders\ConfigBuilder;
use yii\di\Instance;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', ['model' => Instance::of(ConfigBuilder::class)->get()->build() ]);
    }

    /**
     * @throws \yii\base\NotSupportedException
     */
    public function actionCreate()
    {
        /** @var ConfigBuilder $builder */
        $builder = Instance::of(ConfigBuilder::class)->get();

        $data = \Yii::$app->getRequest()->post('Config');
        $config = $builder->setData($data)->build();
        $config->save();
        $this->redirect('/admin');
    }
}
