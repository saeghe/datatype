<?php

namespace Tests\Map\FirstKeyTest;

use Saeghe\Datatype\Map;
use Saeghe\Datatype\Pair;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should return first key that pass the given condition',
    case: function () {
        $map = new Map();
        $map->push(new Pair(1, 'foo'));
        $map->push(new Pair(2, 'bar'));
        $map->push(new Pair(3, 'baz'));

        assert_true(2 === $map->first_key(fn (Pair $pair) => $pair->value === 'bar'));
    }
);

test(
    title: 'it should return first key of the map when the condition does not pass',
    case: function () {
        $map = new Map();
        $map->push(new Pair(1, 'foo'));
        $map->push(new Pair(2, 'bar'));
        $map->push(new Pair(3, 'baz'));

        assert_true(1 === $map->first_key());
    }
);
