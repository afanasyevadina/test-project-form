<?php

namespace App\Models\Factories;

use App\Models\Savers\DatabaseSaver;
use App\Models\Savers\Saver;

class DatabaseSaverFactory extends SaverFactory
{
    /**
     * @return Saver
     */
    public function getSaver(): Saver
    {
        return new DatabaseSaver();
    }
}
