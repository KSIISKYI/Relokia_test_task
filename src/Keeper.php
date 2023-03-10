<?php

namespace App;

/**
* Keeper
*
* This class creates and saves a .csv file
*
*/

class Keeper
{
    protected $file;

    public function __construct(string $filename)
    {
        $this->file = fopen($filename, 'w');
    }

    public function writeLine(array $values)
    {
        fputcsv($this->file, $values, ';');
    }

    public function __destruct()
    {
        fclose($this->file);
    }
}
