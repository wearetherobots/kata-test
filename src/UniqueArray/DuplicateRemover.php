
<?php

namespace Kata\UniqueArray;

class DuplicateRemover
{
    public function __invoke(array $input): array
    {
        $uniqueValues = [];
        foreach ($input as $value) {
            if (!in_array($value, $uniqueValues)) {
                $uniqueValues[] = $value;
            }
        }
        return $uniqueValues;
    }
}