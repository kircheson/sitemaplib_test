<?php

namespace App\Factory;

use App\Interfaces\WriterInterface;

class WriterFactory
{
    public static function createWriter(string $type): WriterInterface
    {
        switch ($type) {
            case 'xml':
                return new \App\Writers\XMLWriter();
            case 'json':
                return new \App\Writers\JSONWriter();
            case 'csv':
                return new \App\Writers\CSVWriter();
            default:
                throw new \App\Errors\WriterTypeNotFound("Неподдерживаемый тип записи: {$type}");
        }
    }
}
