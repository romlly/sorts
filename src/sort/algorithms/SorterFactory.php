<?php
namespace sort\algorithms;

/**
 * Class SorterFactory
 * @package sort\algorithms
 * Factory design pattern that provides a sorter based on its name.
 */
class SorterFactory
{
    /**
     * Returns sorter based on its name.
     *
     * @param string $sorterName
     * @return Sorter
     */
    public static function getSorter($sorterName)
    {
        $sorterClassPath = __DIR__ . '/' . lcfirst($sorterName) . '/' . $sorterName . 'Sorter.php';

        if (file_exists($sorterClassPath)) {
            $className = '\\sort\\algorithms\\' . lcfirst($sorterName) . '\\' . $sorterName . 'Sorter';
            return new $className();
        }

        throw new \InvalidArgumentException('Sorter not found');
    }
}
