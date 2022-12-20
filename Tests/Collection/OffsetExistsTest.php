<?php

namespace Tests\Collection\OffsetExistsTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;
use function Saeghe\TestRunner\Assertions\Boolean\assert_false;

test(
    title: 'it should implement offsetExists',
    case: function () {
        $collection = new Collection([1 => 'foo', 2 => 'bar']);

        assert_true($collection->offsetExists(1));
        assert_false($collection->offsetExists(3));
    }
);
