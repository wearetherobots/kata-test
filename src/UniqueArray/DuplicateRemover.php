<?php

namespace Kata\UniqueArray;

class DuplicateRemover
{
    public function __invoke(array $input): array
    {
        /**
         * @todo
         */
        $unique = [];
        foreach ($input as $data) {
            if (!$this->findInUnique($unique, $data)) {
                $unique[] = $data;
            }
        }
        return $unique;
    }

    public function findInUnique(array $uniqueArr, int $n): bool
    {
        $exist = false;
        foreach ($uniqueArr as $val) {
            if ($n == $val) {
                $exist = true;
            }
        }
        return $exist;
    }
}
