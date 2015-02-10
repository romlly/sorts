<?php
namespace sort\algorithms\phpSortFunction;

use sort\algorithms\Sorter;

/**
 * Class PhpSortFunctionSorter
 * @package sort\algorithms\phpSortFunction
 * PHP sort.
 * See details : http://php.net/manual/fr/function.sort.php
 */
class PhpSortFunctionSorter extends Sorter
{
    public function sortArray(array $arrayToSort)
    {
        sort($arrayToSort);

        return $arrayToSort;
    }
}
