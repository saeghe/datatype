<?php

namespace Tests\Map\ForgetTest;

use Saeghe\Datatype\Map;
use Saeghe\Datatype\Pair;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should forget item that passes given condition',
    case: function () {
        $map = new Map();
        $map->put($item = new Pair(1, 'foo'));
        $map->put(new Pair(2, 'bar'));
        $map->put(new Pair(3, 'baz'));

        assert_true([
                2 => new Pair(3, 'baz'),
            ] == $map->forget(fn (Pair $pair, int $index) => $pair === $item || $index === 1)->items()
        );
    }
);
