<?php

namespace Tests\Collection\KeysTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should run collection keys',
    case: function () {
        $collection = new Collection([1 => 'foo', 2 => 'bar']);

        assert_true([1, 2] === $collection->keys());
    }
);
