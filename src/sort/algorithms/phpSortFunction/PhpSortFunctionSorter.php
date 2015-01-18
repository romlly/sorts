<?php
namespace sort\algorithms\phpSortFunction;

use sort\algorithms\Sorter;

class PhpSortFunctionSorter extends Sorter
{
    public function sortArray(array $arrayToSort)
    {
        sort($arrayToSort);

        return $arrayToSort;
    }
}
