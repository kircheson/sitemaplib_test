<?php

namespace App;

class Validator
{
    public function validatePages(array $pages): bool
    {
        foreach ($pages as $page) {
            if (!isset($page['loc']) || !isset($page['lastmod'])) {
                return false;
            }
            if (!is_string($page['priority']) || !is_numeric($page['priority'])) {
                return false;
            }
            if (!in_array($page['changefreq'], ['hourly', 'daily', 'weekly'])) {
                return false;
            }
        }
        return true;
    }
}
