<?php

namespace App\Models\Savers;

use App\Models\Application;

class DatabaseSaver implements Saver
{
    /**
     * @param $content
     * @return void
     */
    public function save($content) : void
    {
        Application::create($content);
    }
}
