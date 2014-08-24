<?php
namespace sort\phpSortFunction;

use sort\Sorter;

class PhpSortFunctionSorter extends Sorter
{
    public function sortArray(array $arrayToSort)
    {
        sort($arrayToSort);

        return $arrayToSort;
    }
}
