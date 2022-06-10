<?php

namespace App\Models\Factories;

use App\Models\Savers\Saver;

abstract class SaverFactory
{
    /**
     * @return Saver
     */
    abstract public function getSaver() : Saver;

    /**
     * @param $content
     * @return void
     */
    public function save($content): void
    {
        $saver = $this->getSaver();
        $saver->save($content);
    }
}
