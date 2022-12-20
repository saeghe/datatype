<?php

namespace Tests\Map\KeysTest;

use Saeghe\Datatype\Map;
use Saeghe\Datatype\Pair;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should return keys of the map',
    case: function () {
        $map = new Map();
        assert_true([] === $map->keys());

        $map->put(new Pair(1, 'foo'));
        assert_true([1] === $map->keys());

        $map->put(new Pair('bar', 'baz'));
        assert_true([1, 'bar'] === $map->keys());
    }
);
