<?php

namespace App\Models\Savers;

use App\Models\Application;

class CsvSaver extends FileSaver
{
    /**
     * @param $content
     * @return void
     */
    public function save($content) : void
    {
        $application = (new Application($content))->toArray();
        $file = fopen($this->fileName, 'a+');
        if(!file_exists($this->fileName) || !file_get_contents($this->fileName)) {
            fputcsv($file, array_keys($application));
        }
        fputcsv($file, $application);
        fclose($file);
    }
}
