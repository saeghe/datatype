<?php

namespace Tests\Collection\ValuesTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should run collection values',
    case: function () {
        $collection = new Collection([1 => 'foo', 2 => 'bar']);

        assert_true(['foo', 'bar'] === $collection->values());
    }
);
