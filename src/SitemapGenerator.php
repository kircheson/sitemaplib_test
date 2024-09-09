<?php

namespace App;

use App\Factory\WriterFactory;
use App\Errors\WriterTypeNotFound;
use \Exception;

class SitemapGenerator
{
    private array $pages;
    private string $outputPath;
    private string $writerType;

    public function __construct(array $pages, string $outputPath, string $writerType)
    {
        $this->pages = $pages;
        $this->outputPath = $outputPath;
        $this->writerType = $writerType;
    }

    public function generate(): void
    {
        try {
            if (!$this->validateInput()) {
                throw new \InvalidArgumentException('Invalid input');
            }

            $writer = WriterFactory::createWriter($this->writerType);
            $writer->write($this->pages);

            $dirName = dirname($this->outputPath);
            if (!is_dir($dirName)) {
                mkdir($dirName, 0755, true);
            }

            $writer->save($this->outputPath);
        } catch (\Exception $e) {
            throw new \RuntimeException("Error generating sitemap: " . $e->getMessage());
        }
    }

    private function validateInput(): bool
    {
        if (!in_array($this->writerType, ['xml', 'json', 'csv'])) {
            return false;
        }

        if (!file_exists($this->outputPath)) {
            return false;
        }

        return true;
    }
}
