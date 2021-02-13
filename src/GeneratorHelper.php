<?php

namespace Chipulaja\Algo\Sudoku;

class GeneratorHelper
{
    public function getAllHorisontalValue($location, $data)
    {
        $horisontalValue = [];
        $x = $location['x'];
        for ($i = $x; $i <= $x; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if (!empty($data[$i][$j])) {
                    $horisontalValue[] = $data[$i][$j];
                }
            }
        }
        return $horisontalValue;
    }

    public function getAllVerticalValue($location, $data)
    {
        $verticalValue = [];
        $y = $location['y'];
        for ($i = 0; $i < 9; $i++) {
            for ($j = $y; $j <= $y; $j++) {
                if (!empty($data[$i][$j])) {
                    $verticalValue[] = $data[$i][$j];
                }
            }
        }
        return $verticalValue;
    }

    public function getAllSquereValue($location, $data)
    {
        $squereValue = [];
        $x = $location['x'];
        $y = $location['y'];

        $iStart = 3 * floor($x / 3);
        $iEnd   = $iStart + 2;
        $jStart = 3 * floor($y / 3);
        $jEnd   = $jStart + 2;

        for ($i = $iStart; $i <= $iEnd; $i++) {
            for ($j = $jStart; $j <= $jEnd; $j++) {
                if (!empty($data[$i][$j])) {
                    $squereValue[] = $data[$i][$j];
                }
            }
        }
        return $squereValue;
    }

    public function isValidSudoku($data)
    {
        $isValidSudoku = true;
        for ($x = 0; $x <= 8; $x++) {
            for ($y = 0; $y <= 8; $y++) {
                $currentValue = @$data[$x][$y];
                $dataTemp = $data;
                $dataTemp[$x][$y] = 0;
                $location = ["x" => $x, "y" => $y];

                if (empty($currentValue)) {
                    return false;
                }

                $horisontalValue = $this->getAllHorisontalValue($location, $dataTemp);
                if (in_array($currentValue, $horisontalValue)) {
                    return false;
                }

                $verticalValue = $this->getAllVerticalValue($location, $dataTemp);
                if (in_array($currentValue, $verticalValue)) {
                    return false;
                }
            }
        }
        return $isValidSudoku;
    }

    public function getBoard($data)
    {
        $board = "";
        for ($x = 0; $x <= 8; $x++) {
            if ($x % 3 === 0) {
                $board .= "  " . str_repeat("-", 23) . PHP_EOL;
            }
            for ($y = 0; $y <= 8; $y++) {
                if ($y % 3 === 0) {
                    $board .= " |";
                }
                if (!empty(@$data[$x][$y])) {
                    $board .= " " . $data[$x][$y];
                } else {
                    $board .= " \033[31m0\033[0m";
                }
                if ($y === 8) {
                    $board .= " | " . PHP_EOL;
                }
            }
            if ($x === 8) {
                $board .= "  " . str_repeat("-", 23) . PHP_EOL;
            }
        }

        return $board;
    }
}
