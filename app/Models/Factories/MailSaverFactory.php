<?php

namespace App\Models\Factories;

use App\Models\Savers\MailSaver;
use App\Models\Savers\Saver;

class MailSaverFactory extends SaverFactory
{
    /**
     * @return Saver
     */
    public function getSaver(): Saver
    {
        return new MailSaver();
    }
}
