<?php
declare(strict_types=1);

namespace app\modules\admin\controllers;

use app\models\social\Base;
use app\repository\SocialNetworks as SocialNetworksRepository;
use ifrolikov\dto\Interfaces\DtoBuilderInterface;
use yii\base\Module;
use yii\web\Controller;

class SocialController extends Controller
{
    /** @var SocialNetworksRepository */
    private $socialNetworksRepository;

    /**
     * SocialNetworks constructor.
     * @param string $id
     * @param Module $module
     * @param array $config
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
     */
    public function __construct(string $id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->socialNetworksRepository = \Yii::$container->get(SocialNetworksRepository::class);
    }

    /**
     * @return string
     */
    public function actionIndex(): string
    {
        $config = $this->socialNetworksRepository->getBase();
        return $this->render('index', ['config' => $config]);
    }


    /**
     * @return string
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\di\NotInstantiableException
     * @throws \ReflectionException
     */
    public function actionCreate(): string
    {
        $post = \Yii::$app->getRequest()->post();
        var_dump($post); exit;
        /** @var DtoBuilderInterface $dtoBuilder */
        $dtoBuilder = \Yii::$container->get(DtoBuilderInterface::class);
        if (!empty($post)) {
            $socialNetworksBase = $dtoBuilder->setData($post)->build(Base::class);
            $this->socialNetworksRepository->save($socialNetworksBase);
        }
        return $this->actionIndex();
    }
}