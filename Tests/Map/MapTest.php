<?php

namespace Tests\Map\MapTest;

use Saeghe\Datatype\Map;
use Saeghe\Datatype\Pair;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should return empty array as map when there is no item in the map',
    case: function () {
        $map = new Map();

        assert_true([] === $map->map(fn (Pair $pair) => $pair->key.$pair->value));
    }
);

test(
    title: 'it should map a map items by return value of the given callable',
    case: function () {
        $map = new Map();

        $map->put(new Pair(1, 'foo'));
        $map->put(new Pair(2, 'bar'), 'baz');

        assert_true(['01foo', 'baz2bar'] === $map->map(fn (Pair $pair, mixed $index) => $index.$pair->key.$pair->value));
    }
);
