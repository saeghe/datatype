<?php

namespace Tests\Arr\ReduceTest;

use function Saeghe\Datatype\Arr\reduce;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should return the carry when given array is empty',
    case: function () {
        assert_true('foo' === reduce([], fn ($carry, $value, $key) => $value, 'foo'));
    }
);

test(
    title: 'it should reduce given array by the given closure',
    case: function () {
        assert_true('bar' === reduce(['foo', 'bar', 'baz'], fn ($carry, $value, $key) => $key === 1 ? $value : $carry));
    }
);
