<?php
namespace sort\algorithms\bubble;

use sort\algorithms\Sorter;

/**
 * Class BubbleSorter
 * @package sort\algorithms\bubble
 * Bubble sort.
 * See details : http://en.wikipedia.org/wiki/Bubble_sort
 */
class BubbleSorter extends Sorter
{
    private $arrayLength;

    private $arrayHasChanged = false;

    private $cursor = 0;

    public function __construct(array $arrayToSort)
    {
        parent::__construct($arrayToSort);

        $this->arrayLength = count($arrayToSort);
    }

    public function nextStep()
    {
        parent::nextStep();

        if ($this->cursor < $this->arrayLength - 1) {
            if ($this->arrayToSort[$this->cursor] > $this->arrayToSort[$this->cursor + 1]) {
                $tmp = $this->arrayToSort[$this->cursor];
                $this->arrayToSort[$this->cursor] = $this->arrayToSort[$this->cursor + 1];
                $this->arrayToSort[$this->cursor + 1] = $tmp;
                $this->arrayHasChanged = true;
            }

            if (++$this->cursor === $this->arrayLength - 1) {
                if ($this->arrayHasChanged) {
                    $this->cursor = 0;
                    $this->arrayHasChanged = false;
                } else {
                    $this->sortIsFinished = true;
                }
            }
        }
    }
}
