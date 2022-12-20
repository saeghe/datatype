<?php

namespace Tests\Collection\PushTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should push the given item to the collection',
    case: function () {
        $collection = new Collection([1 => 'foo', 2 => 'bar']);
        $collection->push('baz');

        assert_true([1 => 'foo', 2 => 'bar', 'baz'] === $collection->items());
    }
);
