<?php

namespace Tests\Collection\OffsetGetTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should check should implement offsetGet',
    case: function () {
        $collection = new Collection([1 => 'foo', 2 => 'bar']);

        assert_true('foo' === $collection->offsetGet(1));
        assert_true('bar' === $collection->offsetGet(2));
    }
);
