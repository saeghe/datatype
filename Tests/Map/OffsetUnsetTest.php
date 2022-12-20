<?php

namespace Tests\Map\OffsetUnsetTest;

use Saeghe\Datatype\Map;
use Saeghe\Datatype\Pair;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should check should implement offsetUnset',
    case: function () {
        $map = new Map();
        $map->put(new Pair(1, 'foo'));
        $map->put(new Pair(2, 'bar'));

        $map->offsetUnset(1);

        assert_true([new Pair(1, 'foo')] == $map->items());
    }
);
