<?php
namespace sort;

use PDO;
use sort\algorithms\Sorter;
use sort\algorithms\SorterFactory;

/**
 * Class Benchmarker
 * @package sort
 *
 * The benchmark side of the project.
 * This class selects all sort algorithms and bench them.
 */
class Benchmarker
{
    /**
     * Well, it runs the bench.
     *
     * @FIXME The 'storeResult' thing has nothing to do here
     */
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

    /**
     * Do execute a sort and returns the algorithm performance.
     *
     * @param Sorter $sorter
     * @param int $numberOfElementsToSort
     * @return double time spent for the sort
     */
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
