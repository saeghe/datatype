<?php

namespace Tests\Str\AfterLastOccurrenceTest;

use Saeghe\Datatype\Str;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should return subject string when needle is empty',
    case: function () {
        $subject = 'hello world';
        assert_true($subject === Str\after_last_occurrence($subject, ''));
    }
);

test(
    title: 'it should return the substring after the last occurrence',
    case: function () {
        assert_true(' hello world' === Str\after_last_occurrence('This is hello world', 'This is'));

        $subject = 'My\Class\Name';
        assert_true('Name' === Str\after_last_occurrence($subject, '\\'));

        $subject = 'This is another sentence contains i to test';
        assert_true(' to test' === Str\after_last_occurrence($subject, 'i'));
    }
);

test(
    title: 'it should return subject string when needle is not in the subject',
    case: function () {
        $subject = 'hello world';
        assert_true($subject === Str\after_last_occurrence($subject, 'my'));
    }
);
