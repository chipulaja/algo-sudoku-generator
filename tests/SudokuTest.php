<?php

use Chipulaja\Algo\Sudoku\Generator;
use Chipulaja\Algo\Sudoku\GeneratorHelper;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    public function testGenerator()
    {
        $generator = new Generator();
        $helper = new GeneratorHelper();
        for ($i = 0; $i < 100; $i++) {
            $board = $generator->generate();
            $isValidSudoku = $helper->isValidSudoku($board);
            $this->assertEquals($isValidSudoku, true);
        }
    }

    public function testValidation()
    {
        //valid
        $validData = [
            [ 8, 2, 9,  4, 3, 5,  7, 6, 1 ],
            [ 5, 7, 4,  6, 1, 8,  3, 2, 9 ],
            [ 1, 3, 6,  2, 9, 7,  4, 8, 5 ],

            [ 3, 1, 8,  5, 7, 6,  2, 9, 4 ],
            [ 4, 9, 2,  1, 8, 3,  6, 5, 7 ],
            [ 7, 6, 5,  9, 4, 2,  1, 3, 8 ],

            [ 9, 4, 3,  8, 2, 1,  5, 7, 6 ],
            [ 2, 5, 1,  7, 6, 9,  8, 4, 3 ],
            [ 6, 8, 7,  3, 5, 4,  9, 1, 2 ],
        ];
        $helper = new GeneratorHelper();
        $isValidSudoku = $helper->isValidSudoku($validData);
        $this->assertEquals($isValidSudoku, true);

        // novalid horizontal
        $novalidData1 = [
            [ 8, 8, 9,  4, 3, 5,  7, 6, 1 ],
            [ 5, 7, 4,  6, 1, 8,  3, 2, 9 ],
            [ 1, 3, 6,  2, 9, 7,  4, 8, 5 ],

            [ 3, 1, 8,  5, 7, 6,  2, 9, 4 ],
            [ 4, 9, 2,  1, 8, 3,  6, 5, 7 ],
            [ 7, 6, 5,  9, 4, 2,  1, 3, 8 ],

            [ 9, 4, 3,  8, 2, 1,  5, 7, 6 ],
            [ 2, 5, 1,  7, 6, 9,  8, 4, 3 ],
            [ 6, 8, 7,  3, 5, 4,  9, 1, 2 ],
        ];
        $isValidSudoku1 = $helper->isValidSudoku($novalidData1);
        $this->assertEquals($isValidSudoku1, false);

        // novalid vertical
        $novalidData2 = [
            [ 8, 2, 9,  4, 3, 5,  7, 6, 1 ],
            [ 5, 7, 4,  6, 1, 8,  3, 2, 9 ],
            [ 1, 2, 6,  2, 9, 7,  4, 8, 5 ],

            [ 3, 1, 8,  5, 7, 6,  2, 9, 4 ],
            [ 4, 9, 2,  1, 8, 3,  6, 5, 7 ],
            [ 7, 6, 5,  9, 4, 2,  1, 3, 8 ],

            [ 9, 4, 3,  8, 2, 1,  5, 7, 6 ],
            [ 2, 5, 1,  7, 6, 9,  8, 4, 3 ],
            [ 6, 8, 7,  3, 5, 4,  9, 1, 2 ],
        ];

        $isValidSudoku2 = $helper->isValidSudoku($novalidData2);
        $this->assertEquals($isValidSudoku2, false);

        // novalid empty data
        $novalidData3 = [
            [ 8, 2, 0,  4, 3, 5,  7, 6, 1 ],
            [ 5, 7, 4,  6, 1, 8,  3, 2, 9 ],
            [ 1, 3, 6,  2, 9, 7,  4, 8, 5 ],

            [ 3, 1, 8,  5, 7, 6,  2, 9, 4 ],
            [ 4, 9, 2,  1, 8, 3,  6, 5, 7 ],
            [ 7, 6, 5,  9, 4, 2,  1, 3, 8 ],

            [ 9, 4, 3,  8, 2, 1,  5, 7, 6 ],
            [ 2, 5, 1,  7, 6, 9,  8, 4, 3 ],
            [ 6, 8, 7,  3, 5, 4,  9, 1, 2 ],
        ];

        $isValidSudoku3 = $helper->isValidSudoku($novalidData3);
        $this->assertEquals($isValidSudoku3, false);
    }

    public function testBoardPrinter()
    {
        $data = [
            [ 8, 2, 9,  4, 3, 5,  7, 6, 1 ],
            [ 5, 7, 4,  6, 1, 8,  3, 2, 9 ],
            [ 1, 3, 6,  2, 9, 7,  4, 8, 5 ],

            [ 3, 1, 8,  5, 7, 6,  2, 9, 4 ],
            [ 4, 9, 2,  1, 8, 3,  6, 5, 7 ],
            [ 7, 6, 5,  9, 4, 2,  1, 3, 8 ],

            [ 9, 4, 3,  8, 2, 1,  5, 7, 6 ],
            [ 2, 5, 1,  7, 6, 9,  8, 4, 3 ],
            [ 6, 8, 7,  3, 5, 4,  9, 1, 2 ],
        ];

        $expected =<<<TEXT
  -----------------------
 | 8 2 9 | 4 3 5 | 7 6 1 | 
 | 5 7 4 | 6 1 8 | 3 2 9 | 
 | 1 3 6 | 2 9 7 | 4 8 5 | 
  -----------------------
 | 3 1 8 | 5 7 6 | 2 9 4 | 
 | 4 9 2 | 1 8 3 | 6 5 7 | 
 | 7 6 5 | 9 4 2 | 1 3 8 | 
  -----------------------
 | 9 4 3 | 8 2 1 | 5 7 6 | 
 | 2 5 1 | 7 6 9 | 8 4 3 | 
 | 6 8 7 | 3 5 4 | 9 1 2 | 
  -----------------------

TEXT;
        $helper = new GeneratorHelper();
        $board = $helper->getBoard($data);
        $this->assertEquals($board, $expected);

        $novalidData = [
            [ 8, 2, 9,  4, 3, 5,  7, 6, 0 ],
            [ 5, 7, 4,  6, 1, 8,  3, 2, 9 ],
            [ 1, 3, 6,  2, 9, 7,  4, 8, 5 ],

            [ 3, 1, 8,  5, 7, 6,  2, 9, 4 ],
            [ 4, 9, 2,  1, 8, 3,  6, 5, 7 ],
            [ 7, 6, 5,  9, 4, 2,  1, 3, 8 ],

            [ 9, 4, 3,  8, 2, 1,  5, 7, 6 ],
            [ 2, 5, 1,  7, 6, 9,  8, 4, 3 ],
            [ 6, 8, 7,  3, 5, 4,  9, 1, 2 ],
        ];

        $expected =<<<TEXT
  -----------------------
 | 8 2 9 | 4 3 5 | 7 6 \033[31m0\033[0m | 
 | 5 7 4 | 6 1 8 | 3 2 9 | 
 | 1 3 6 | 2 9 7 | 4 8 5 | 
  -----------------------
 | 3 1 8 | 5 7 6 | 2 9 4 | 
 | 4 9 2 | 1 8 3 | 6 5 7 | 
 | 7 6 5 | 9 4 2 | 1 3 8 | 
  -----------------------
 | 9 4 3 | 8 2 1 | 5 7 6 | 
 | 2 5 1 | 7 6 9 | 8 4 3 | 
 | 6 8 7 | 3 5 4 | 9 1 2 | 
  -----------------------

TEXT;
        $board = $helper->getBoard($novalidData);
        $this->assertEquals($board, $expected);
    }
}
