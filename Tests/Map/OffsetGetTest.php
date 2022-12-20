<?php

namespace Tests\Map\OffsetGetTest;

use Saeghe\Datatype\Map;
use Saeghe\Datatype\Pair;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should check should implement offsetGet',
    case: function () {
        $map = new Map();
        $map->put($item1 = new Pair(1, 'foo'));
        $map->put($item2 = new Pair(2, 'bar'));

        assert_true($item1 === $map->offsetGet(0));
        assert_true($item2 === $map->offsetGet(1));
    }
);
