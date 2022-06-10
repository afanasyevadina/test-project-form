<?php

namespace App\Models\Savers;

interface Saver
{
    /**
     * @param $content
     * @return void
     */
    public function save($content) : void;
}
