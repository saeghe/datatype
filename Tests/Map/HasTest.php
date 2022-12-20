<?php

namespace Tests\Map\HasTest;

use Saeghe\Datatype\Map;
use Saeghe\Datatype\Pair;
use function Saeghe\TestRunner\Assertions\Boolean\assert_false;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should return true if collection has item with the given condition',
    case: function () {
        $map = new Map();
        $map->put(new Pair('foo', 'bar'));
        $map->put(new Pair('baz', 'qux'));

        assert_true($map->has(fn ($item) => $item->value === 'qux'));
        assert_true($map->has(fn ($item) => $item->key === 'baz'));
        assert_false($map->has(fn ($item) => $item->key === 0));
        assert_false($map->has(fn ($item) => $item->value === null));
    }
);

