<?php

namespace App\Models\Factories;

use App\Models\Savers\JsonSaver;
use App\Models\Savers\Saver;

class JsonSaverFactory extends SaverFactory
{
    /**
     * @return Saver
     */
    public function getSaver(): Saver
    {
        return new JsonSaver(storage_path('app/applications.json'));
    }
}
