<?php

namespace Tests\Map\GetIteratorTest;

use Saeghe\Datatype\Map;
use Saeghe\Datatype\Pair;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should implement getIterator',
    case: function () {
        $map = new Map();
        $map->put(new Pair('foo', 'bar'));
        $map->put(new Pair('baz', 'qux'));

        $actual = [];
        foreach ($map as $key => $value) {
            $actual[$key] = $value;
        }

        assert_true($actual == [new Pair('foo', 'bar'), new Pair('baz', 'qux')]);
    }
);
