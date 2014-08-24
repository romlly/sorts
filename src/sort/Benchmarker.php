<?php
namespace sort;

class Benchmarker
{
    const INITIAL_NUMBER_OF_ELEMENTS_TO_SORT = 10;

    private static $availableSorts = [
        'PhpSortFunction', 
        'Selection', 
        'SelectionEnhanced',
        'Insertion'
    ];

    public function run()
    {
        foreach (self::$availableSorts as $sort) {
            for($i = 0; $i <= 3; $i++) {
                $this->benchmarkSort(SorterFactory::getSorter($sort), self::INITIAL_NUMBER_OF_ELEMENTS_TO_SORT * pow(10,$i));
            }
        }
    }

    private function benchmarkSort(Sorter $sorter, $numberOfElementsToSort)
    {
        $t0 = microtime(true);
        $sortedArray = $sorter->sortArray(Tools::getArrayToSort($numberOfElementsToSort, $numberOfElementsToSort));
        $timeSpent = microtime(true) - $t0;
        
        $className = preg_replace('@.*\\\@', '', get_class($sorter));
        $sortStatus = $sorter->verifySort($sortedArray) ? 'SUCCESS' : 'FAILURE';

        echo "[$className] [$numberOfElementsToSort elements] [$sortStatus] ${timeSpent}s\n";
    }
}
