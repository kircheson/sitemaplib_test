<?php

namespace App\Writers;

use App\Interfaces\WriterInterface;

class JSONWriter implements WriterInterface
{
    public function write(array $pages): void
    {
        echo json_encode($pages, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function save(string $path): void
    {
        file_put_contents($path, $this->write($this->pages));
    }
}
