<?php

namespace Tests\Collection\HasTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_false;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should return true if collection has item with the given condition',
    case: function () {
        $collection = new class(['foo' => 'bar', 'baz' => 'qux']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true($collection->has(fn ($item, $key) => $item === 'qux'));
        assert_true($collection->has(fn ($item, $key) => $key === 'baz'));
        assert_false($collection->has(fn ($item, $key) => $key === 0));
        assert_false($collection->has(fn ($item, $key) => $item === null));
    }
);

