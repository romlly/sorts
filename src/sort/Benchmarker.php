<?php
namespace sort;

use PDO;
use sort\algorithms\Sorter;
use sort\algorithms\SorterFactory;

class Benchmarker
{
    public function run()
    {
        $conf = Tools::getConf();

        $dbConnection = null;
        if ($conf['benchmark']['storeResults']) {
            $dbConnection = new PDO("mysql:host={$conf['db']['host']};dbname={$conf['db']['name']}", $conf['db']['user'], $conf['db']['password']);
        }

        $elementsConf = $conf['benchmark']['dataToSort']['elements'];

        foreach ($conf['benchmark']['algorithms'] as $sort) {
            for ($i = $elementsConf['from']; $i <= $elementsConf['to']; $i += $elementsConf['step']) {
                $microtime = $this->benchmarkSort(SorterFactory::getSorter($sort), $i);

                if ($dbConnection !== null) {
                    $dbConnection->exec("INSERT INTO benchmark (benchmark_name, algorithm, number_of_elements, microtime) VALUES ('{$conf['benchmark']['name']}', '$sort', '$i', '$microtime')");
                }
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

        return $timeSpent;
    }
}
