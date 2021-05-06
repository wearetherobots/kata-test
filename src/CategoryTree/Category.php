<?php

namespace Kata\CategoryTree;

class Category
{
    public function __construct(
        private int $id,
        private string $name,
        private array $children = []
    ){}

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function children(): array
    {
        return $this->children;
    }

    public function addChild(Category $child): self
    {
        $this->children[] = $child;
        return $this;
    }
}
