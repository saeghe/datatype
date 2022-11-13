<?php

namespace Tests\Str\BetweenTest;

use function Saeghe\Datatype\Str\between;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it returns substring in the given subject between the given start and the given end substrings',
    case: function () {
        $result = between('hello world', 'hello', 'world');
        assert_true(' ' === $result, 'result of the between is wrong: ' . $result);

        $result = between('This is hello world', 'This is ', ' world');
        assert_true('hello' === $result, 'result of the between is wrong: ' . $result);
    }
);

test(
    title: 'it returns substring in the given subject from the given start to the end of the subject when the given end is empty',
    case: function () {
        $result = between('This is hello world', 'This is ', '');
        assert_true('hello world' === $result, 'result of the between is wrong: ' . $result);
    }
);

test(
    title: 'it returns substring in the given subject from start to the given end of the subject when the given start is empty',
    case: function () {
        $result = between('This is hello world', '', ' world');
        assert_true('This is hello' === $result, 'result of the between is wrong: ' . $result);
    }
);

test(
    title: 'it returns the given subject when the start and the end are empty strings',
    case: function () {
        $result = between('This is hello world', '', '');
        assert_true('This is hello world' === $result, 'result of the between is wrong: ' . $result);
    }
);
