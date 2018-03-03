<?php

namespace app\models;

use app\factories\AbstractConfig;
use app\interfaces\ConfigModelInterface;

class Config extends AbstractConfig implements ConfigModelInterface
{
    /**
     * @return array
     */
    public function loadFromSource(): array
    {
        return json_decode(file_get_contents($this->getSourcePath()), true);
    }

    /**
     * @return string
     */
    private function getSourcePath(): string
    {
        return realpath(__DIR__ . '/../_data/config.json');
    }

    /**
     * @return ConfigModelInterface
     */
    public function saveToSource()
    {
        $data = $this->toArray();
        if (is_array($data['prices'])) {
            $data['prices'] = json_encode($data['prices'], JSON_UNESCAPED_UNICODE);
        }
        file_put_contents($this->getSourcePath(), json_encode($this->toArray(), JSON_UNESCAPED_UNICODE));
        return $this;
    }

    public function save()
    {
        $this->saveToSource();
    }
}