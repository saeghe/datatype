<?php

namespace Tests\Map\PushTest;

use Saeghe\Datatype\Map;
use Saeghe\Datatype\Pair;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should push the given pair to the map items',
    case: function () {
        $map = new Map();
        $map->push(new Pair(1, 'foo'));

        assert_true([new Pair(1, 'foo')] == $map->items());

        $map->push(new Pair(2, 'bar'));

        assert_true([new Pair(1, 'foo'), new Pair(2, 'bar')] == $map->items());
    }
);

test(
    title: 'it should replace existing key',
    case: function () {
        $map = new Map();
        $map->push(new Pair(1, 'foo'));

        assert_true([new Pair(1, 'foo')] == $map->items());

        $map->push(new Pair(1, 'bar'));

        assert_true([new Pair(1, 'bar')] == $map->items());
    }
);
