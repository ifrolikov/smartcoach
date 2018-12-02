<?php
declare(strict_types=1);

namespace app\models\social;

use yii\base\Model;

final class Instagram extends Model
{
    /**
     * @var string
     */
    private $appId;
    /**
     * @var string
     */
    private $user;
    /**
     * @var string
     */
    private $password;

    public function __construct(string $appId, string $user, string $password)
    {
        $this->appId = $appId;
        $this->user = $user;
        $this->password = $password;
        parent::__construct([]);
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}