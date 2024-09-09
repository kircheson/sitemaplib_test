<?php

namespace App\Writers;

use App\Interfaces\WriterInterface;

class CSVWriter implements WriterInterface
{
    public function write(array $pages): void
    {
        $output = fopen('php://temp', 'r+');
        fputcsv($output, ['loc', 'lastmod', 'priority', 'changefreq']);

        foreach ($pages as $page) {
            fputcsv($output, [
                $page['loc'],
                $page['lastmod'],
                $page['priority'],
                $page['changefreq']
            ]);
        }

        rewind($output);
        echo stream_get_contents($output);
        fclose($output);
    }

    public function save(string $path): void
    {
        $output = fopen('php://temp', 'r+');
        fputcsv($output, ['loc', 'lastmod', 'priority', 'changefreq']);

        foreach ($pages as $page) {
            fputcsv($output, [
                $page['loc'],
                $page['lastmod'],
                $page['priority'],
                $page['changefreq']
            ]);
        }

        rewind($output);
        file_put_contents($path, stream_get_contents($output));
        fclose($output);
    }
}
