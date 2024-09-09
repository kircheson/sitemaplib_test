<?php

require_once 'vendor/autoload.php';

$pages = [
    ['loc' => 'https://example.com/', 'lastmod' => '2023-01-01', 'priority' => '1', 'changefreq' => 'hourly'],
    ['loc' => 'https://example.com/page1', 'lastmod' => '2023-01-02', 'priority' => '0.5', 'changefreq' => 'daily'],
];

try {
    $generator = new \App\SitemapGenerator($pages, '/path/to/output/file.xml', 'xml');
    $generator->generate();
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Альтернативное использование для других форматов
// $generator = new \App\SitemapGenerator($pages, '/path/to/output/file.csv', 'csv');
// $generator->generate();

// $generator = new \App\SitemapGenerator($pages, '/path/to/output/file.json', 'json');
// $generator->generate();
