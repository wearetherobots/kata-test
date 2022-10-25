<?php

namespace Kata\CategoryTree;

class Printer
{
    public function build(Category $parent, int $spaces = 0): string
    {
        return $this->getTree($parent);
    }

    public function getTree(Category $parent, int $spaces = 0)
    {
        $children = $parent->children();
        // si esta vacio se agrega el spacio con el nombre
        if (empty($children)) {
            return str_repeat('  ', $spaces++) . $parent->name() . PHP_EOL;
        } else {
            $stringTree = str_repeat('  ', $spaces++) . $parent->name() . PHP_EOL;
            usort($children, fn ($a, $b) => $a->name() <=> $b->name());
            foreach ($children as $child) {
                // se hace uso de lo recursivo
                $stringTree = $stringTree . $this->getTree($child, $spaces);
            }
            return $stringTree;
        }
    }
}
