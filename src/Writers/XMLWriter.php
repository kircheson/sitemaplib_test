<?php

namespace App\Writers;

use App\Interfaces\WriterInterface;

class XMLWriter implements WriterInterface
{
    public function write(array $pages): void
    {
        $xml = new \SimpleXMLElement('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');

        foreach ($pages as $page) {
            $url = $xml->addChild('url');
            $url->addChild('loc', $page['loc']);
            $url->addChild('lastmod', $page['lastmod']);
            $url->addChild('priority', $page['priority']);
            $url->addChild('changefreq', $page['changefreq']);
        }

        $dom = dom_import_simplexml($xml)->ownerDocument;
        $dom->formatOutput = true;
        echo $dom->saveXML();
    }

    public function save(string $path): void
    {
        file_put_contents($path, $this->write($this->pages));
    }
}
