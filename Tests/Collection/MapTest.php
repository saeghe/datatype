<?php

namespace Tests\Collection\MapTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should map items to the given closure',
    case: function () {
        $collection = new Collection(['foo', 'bar', 'baz']);

        assert_true(['0foo', '1bar', '2baz'] === $collection->map(fn ($item, $key) => $key.$item));
    }
);
