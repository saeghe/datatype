<?php

namespace Tests\Arr\TakeTest;

use function Saeghe\Datatype\Arr\take;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should return first value where condition passes and unset item from the main items',
    case: function () {
        $arr = ['foo', 'bar', 'baz'];
        $result = take($arr, fn ($item, $key) => $item === 'bar');

        assert_true('bar' === $result);
        assert_true([0 => 'foo', 2 => 'baz'] === $arr);
    }
);

test(
    title: 'it should return null and keep array intact when condition does not meet for items',
    case: function () {
        $arr = ['foo', 'bar', 'baz'];
        $result = take($arr, fn ($item, $key) => $item === 'qux');

        assert_true(null === $result);
        assert_true([0 => 'foo', 1 => 'bar', 2 => 'baz'] === $arr);
    }
);
