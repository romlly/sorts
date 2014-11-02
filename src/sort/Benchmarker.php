<?php
namespace sort;

use sort\algorithms\SorterFactory;

class Benchmarker
{
    public function run()
    {
        $conf = Tools::getConf();
        $elementsConf = $conf['benchmark']['dataToSort']['elements'];

        foreach ($conf['benchmark']['algorithms'] as $sort) {
            for($i = $elementsConf['from']; $i <= $elementsConf['to']; $i += $elementsConf['step']) {
                $this->benchmarkSort(SorterFactory::getSorter($sort), $i);
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
