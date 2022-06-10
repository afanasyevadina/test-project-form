<?php

namespace App\Models\Factories;

use App\Models\Savers\CsvSaver;
use App\Models\Savers\Saver;

class CsvSaverFactory extends SaverFactory
{
    /**
     * @return Saver
     */
    public function getSaver(): Saver
    {
        return new CsvSaver(storage_path('app/applications.csv'));
    }
}
