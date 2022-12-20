<?php

namespace Tests\Collection\OffsetSetTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should check should implement offsetSet',
    case: function () {
        $collection = new Collection([1 => 'foo', 2 => 'bar']);

        $collection->offsetSet(3, 'baz');

        assert_true([1 => 'foo', 2 => 'bar', 3 => 'baz'] === $collection->items());
    }
);
