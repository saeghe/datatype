<?php

namespace Tests\Map\OffsetSetTest;

use Saeghe\Datatype\Map;
use Saeghe\Datatype\Pair;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should check should implement offsetSet',
    case: function () {
        $map = new Map();
        $map->put(new Pair(1, 'foo'));
        $map->put(new Pair(2, 'bar'));

        $map->offsetSet(4, new Pair(3, 'baz'));

        assert_true([
            0 => new Pair(1 , 'foo'),
            1 => new Pair(2, 'bar'),
            4 => new Pair(3, 'baz')
        ] == $map->items());
    }
);
