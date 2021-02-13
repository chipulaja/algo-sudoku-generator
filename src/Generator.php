<?php

namespace Chipulaja\Algo\Sudoku;

class Generator
{
    protected $helper;
    
    public function __construct()
    {
        $this->helper  = new GeneratorHelper();
    }

    public function generate()
    {
        $data = $this->getEmptyBoard();
        $exclude = [];
        for ($x = 0; $x <= 8; $x++) {
            $data[$x] = $this->getDataRow($data, $x);
            if (sizeof($data[$x]) <= 8) {
                $exclude[$x][0][] = array_slice($data[$x - 1], 0, 3);
                $data[$x] = [0,0,0, 0,0,0, 0,0,0];
                $data[$x - 1] = [0,0,0, 0,0,0, 0,0,0];
                $x = $x - 2;
            }
        }

        return $data;
    }

    private function getDataRow($data, $x, $dataRow = [], $exclude = [])
    {
        for ($y = 0; $y <= 8; $y++) {
            $location = ["x" => $x, "y" => $y];
            $excludeRow = (array)@$exclude[$x][$y];
            $randomNumber = $this->getRandomNumberPosible($location, $data, $dataRow, $excludeRow);
            $dataRow[$y] = $randomNumber;
            if ($randomNumber === 0 && $y === 0) {
                return [];
            } elseif ($randomNumber === 0) {
                unset($dataRow[$y]);
                if (isset($exclude[$x][$y])) {
                    unset($exclude[$x][$y]);
                }
                $yBack = $y - 1;
                if (isset($dataRow[$yBack])) {
                    $y = (($y - 2) >= -1) ? ($y - 2) : -1;
                    $exclude[$x][$yBack][] = $dataRow[$yBack];
                    unset($dataRow[$yBack]);
                };
            }
        }

        return $dataRow;
    }

    private function getRandomNumberPosible($location, $data, $dataRow = [], $exclude = [])
    {
        $horisontalValue = $this->helper->getAllHorisontalValue($location, $data);
        $verticalValue = $this->helper->getAllVerticalValue($location, $data);
        $squereValue = $this->helper->getAllSquereValue($location, $data);
        $allValue = array_merge(
            $horisontalValue,
            $verticalValue,
            $squereValue,
            $dataRow,
            $exclude
        );
        $allValueUnique = array_unique($allValue);
        $randomNumberPosible = $this->getRandomNumber($allValueUnique);
        return $randomNumberPosible;
    }

    private function getRandomNumber(array $exclude = [])
    {
        $numbers = $this->getPossibleValue($exclude);
        shuffle($numbers);
        return (int)@$numbers[0];
    }

    private function getPossibleValue($exclude, $data = [1,2,3,4,5,6,7,8,9])
    {
        $dataDiff = array_diff($data, $exclude);
        $possibleValue = [];
        foreach ($dataDiff as $index => $value) {
            if (in_array($value, range(1, 9))) {
                $possibleValue[$index] = $value;
            }
        }
        return $possibleValue;
    }

    private function getEmptyBoard()
    {
        $board = [];
        for ($i = 0; $i <= 8; $i++) {
            $board[$i] = array_fill(0, 9, 0);
        }
        return $board;
    }
}
