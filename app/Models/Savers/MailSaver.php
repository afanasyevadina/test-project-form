<?php

namespace App\Models\Savers;

use App\Mail\ApplicationMail;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;

class MailSaver implements Saver
{
    /**
     * @param $content
     * @return void
     */
    public function save($content): void
    {
        Mail::mailer('log')->to('admin@test.com')->send(new ApplicationMail(new Application($content)));
    }
}
