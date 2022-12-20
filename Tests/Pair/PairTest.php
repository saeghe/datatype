<?php

namespace Tests\Pair\PairTest;

use Saeghe\Datatype\Pair;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should make a pair',
    case: function () {
        $pair = new Pair(1, 'foo');
        assert_true(['key' => 1, 'value' => 'foo'] === $pair->get());
    }
);
