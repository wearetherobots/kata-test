<?php

namespace Kata\CategoryTree;

class Printer
{
    public function build(Category $parent, int $spaces = 0): string
    {
        $tree = str_repeat('  ', $spaces) . $parent->getName() . PHP_EOL;

        foreach ($parent->getChildren() as $child) {
            $tree .= $this->build($child, $spaces + 1);
        }

        return $tree;
    }
}