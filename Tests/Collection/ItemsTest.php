<?php

namespace Tests\Collection\ItemsTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should run collection items',
    case: function () {
        $collection = new Collection([1 => 'foo', 2 => 'bar']);

        assert_true([1 => 'foo', 2 => 'bar'] === $collection->items());
    }
);
