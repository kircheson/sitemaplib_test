<?php

namespace App\Interfaces;

interface WriterInterface
{
    public function write(array $pages): void;
}
