<?php

namespace Tests\Map\PutTest;

use Saeghe\Datatype\Map;
use Saeghe\Datatype\Pair;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should put to map',
    case: function () {
        $map = new Map();
        $map->put(new Pair(1, 'foo'));
        assert_true(1 === $map->first()->key);
        assert_true('foo' === $map->first()->value);

        $map->put(new Pair(1, 'bar'));
        assert_true(1 === $map->first()->key);
        assert_true('bar' === $map->first()->value);

        $map->put(new Pair(2, 'baz'));
        assert_true(1 === $map->first()->key);
        assert_true('bar' === $map->first()->value);
        assert_true(2 === $map->last()->key);
        assert_true('baz' === $map->last()->value);

        $map->put($item = new Pair(3, 'qux'), 'foo');
        assert_true($item === $map->items()['foo']);
    }
);
