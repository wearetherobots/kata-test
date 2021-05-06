<?php

use Kata\UniqueArray\DuplicateRemover;
use PHPUnit\Framework\TestCase;

class DuplicateRemoverTest extends TestCase
{
    /**
     * @test
     * @dataProvider data
     */
    public function it_should_return_built_string_tree($input, $expected)
    {
        $instance = new DuplicateRemover();

        $this->assertEquals($expected, $instance->__invoke($input));
    }

    public function data()
    {
        return [
            [
                [1, 1, 2],
                [1, 2],
            ],
            [
                [0, 0, 1, 1, 1, 2, 2, 3, 3, 4],
                [0, 1, 2, 3, 4],
            ],
            [
                [100, 200, 300, 300, 300, 300, 300, 300],
                [100, 200, 300],
            ],
            [
                [8, 8, 7, 7, 2, 3, 0, 1, 7, 8, 9, 0, 1, 2],
                [8, 7, 2, 3, 0, 1, 9],
            ],
        ];
    }
}
