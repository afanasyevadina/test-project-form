<?php

namespace App\Models\Savers;

abstract class FileSaver implements Saver
{
    /**
     * @var string
     */
    protected string $fileName;

    /**
     * @param string $fileName
     */
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }
}
