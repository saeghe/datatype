<?php

namespace Tests\Collection\TakeTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should take first item that meets given condition and remove it from items',
    case: function () {
        $collection = new Collection(['foo', 'bar', 'baz']);
        $result = $collection->take(fn ($item, $key) => $item === 'bar');

        assert_true('bar' === $result);
        assert_true([0 => 'foo', 2 => 'baz'] === $collection->items());
    }
);

test(
    title: 'it should return null and keep the collection intact when condition does not meet for items',
    case: function () {
        $collection = new Collection(['foo', 'bar', 'baz']);
        $result = $collection->take(fn ($item, $key) => $item === 'qux');

        assert_true(null === $result);
        assert_true([0 => 'foo', 1 => 'bar', 2 => 'baz'] === $collection->items());
    }
);
