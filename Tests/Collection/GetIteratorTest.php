<?php

namespace Tests\Collection\GetIteratorTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should implement getIterator',
    case: function () {
        $collection = new Collection(['foo' => 'bar', 'baz' => 'qux']);

        $actual = [];
        foreach ($collection as $key => $value) {
            $actual[$key] = $value;
        }

        assert_true($actual === ['foo' => 'bar', 'baz' => 'qux']);
    }
);
