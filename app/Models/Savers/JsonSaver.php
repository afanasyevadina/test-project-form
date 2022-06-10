<?php

namespace App\Models\Savers;

use App\Models\Application;

class JsonSaver extends FileSaver
{
    /**
     * @param $content
     * @return void
     */
    public function save($content) : void
    {
        $applications = collect(file_exists($this->fileName) ? json_decode(file_get_contents($this->fileName)) : []);
        $applications->push(new Application($content));
        file_put_contents($this->fileName, json_encode($applications, JSON_PRETTY_PRINT));
    }
}
