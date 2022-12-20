<?php

namespace Tests\Map\ValuesTest;

use Saeghe\Datatype\Map;
use Saeghe\Datatype\Pair;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should return values of the map',
    case: function () {
        $map = new Map();
        assert_true([] === $map->values());

        $map->put(new Pair(1, 'foo'));
        assert_true(['foo'] === $map->values());

        $map->put(new Pair('bar', 'baz'));
        assert_true(['foo', 'baz'] === $map->values());
    }
);
