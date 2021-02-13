# Algo Sudoku Generator

[![Latest version][ico-version]][link-packagist]
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

a library for generate sudoku.

## Table of contents

- [Install](#install)
- [Usage](#usage)
- [Testing](#testing)

## Install

Via Composer

``` bash
$ composer require chipulaja/algo-sudoku-generator
```

## Usage

```php
use Chipulaja\Algo\Sudoku\Generator;
use Chipulaja\Algo\Sudoku\GeneratorHelper;

$generator = new Generator();
$data = $generator->generate();

$helper = new GeneratorHelper();
echo $helper->getBoard($data);

/*
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

*/
```

## Testing

``` bash
$ vendor\bin\phpunit
```

[ico-version]: https://img.shields.io/packagist/v/Chipulaja/Algo-Sudoku-Generator.svg?style=flat-square
[ico-travis]: https://travis-ci.org/Chipulaja/Algo-Sudoku-Generator.svg?branch=master
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Chipulaja/Algo-Sudoku-Generator.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/chipulaja/Algo-Sudoku-Generator.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/chipulaja/algo-sudoku-generator.svg?style=flat-square


[link-packagist]: https://packagist.org/packages/chipulaja/algo-sudoku-generator
[link-travis]: https://travis-ci.org/Chipulaja/Algo-Sudoku-Generator
[link-scrutinizer]: https://scrutinizer-ci.com/g/Chipulaja/Algo-Sudoku-Generator/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Chipulaja/Algo-Sudoku-Generator
[link-downloads]: https://packagist.org/packages/chipulaja/algo-sudoku-generator

