<?php
namespace sort;

class SorterFactory
{
    public static function getSorter($sorterName)
    {
        $sorterClassPath = __DIR__ . '/' . lcfirst($sorterName) . '/' . $sorterName . 'Sorter.php';

        if (file_exists($sorterClassPath)) {
            $className = '\\sort\\' . lcfirst($sorterName) . '\\' . $sorterName . 'Sorter';
            return new $className();
        }

        throw new \InvalidArgumentException('Sorter not found');
    }
}
