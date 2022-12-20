<?php

namespace Tests\Collection\OffsetUnsetTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should check should implement offsetUnset',
    case: function () {
        $collection = new Collection([1 => 'foo', 2 => 'bar']);

        $collection->offsetUnset(2);

        assert_true([1 => 'foo'] === $collection->items());
    }
);
