<?php

namespace app\interfaces;

/**
 * Interface ConfigModelInterface
 * @package app\interfaces
 */
interface ConfigModelInterface
{
    /**
     * @return array
     */
    public function loadFromSource(): array ;

    /**
     * @return ConfigModelInterface
     */
    public function saveToSource();
}