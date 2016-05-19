<?php
namespace sort\algorithms\bubble;

class BubbleSorterTest extends \PHPUnit_Framework_TestCase
{
    public function testSort()
    {
        $sorter = new BubbleSorter([3, 1, 2]);
        while (!$sorter->sortInFinished()) {
            $sorter->nextStep();
        }

        $this->assertEquals([1, 2, 3], $sorter->getArray());
    }
}