<?php

namespace Tests\Map\OffsetExistsTest;

use Saeghe\Datatype\Map;
use Saeghe\Datatype\Pair;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;
use function Saeghe\TestRunner\Assertions\Boolean\assert_false;

test(
    title: 'it should implement offsetExists',
    case: function () {
        $map = new Map();
        $map->put(new Pair(1, 'foo'));
        $map->put(new Pair(2, 'bar'));

        assert_true($map->offsetExists(0));
        assert_true($map->offsetExists(1));
        assert_false($map->offsetExists(2));
    }
);
