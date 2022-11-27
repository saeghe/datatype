<?php

namespace Tests\Arr\EveryTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_false;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it return true when every item has value',
    case: function () {
        $collection = new class([1, 2, 3]) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true($collection->every());
        $collection = new class(['foo', 'bar', 'baz']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true($collection->every());
    }
);

test(
    title: 'it return false when items are empty',
    case: function () {
        $collection = new class([null, 0, '', []]) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_false($collection->every());
    }
);

test(
    title: 'it should return true when every item passes the check',
    case: function () {
        $collection = new class(['foo', 'bar', 'baz']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true($collection->every(fn ($item) => is_string($item)));

        $collection = new class(['foo', 'bar', 'baz']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true($collection->every(fn ($item, $key) => is_numeric($key)));

        $collection = new class(['foo', 'bar', 'baz']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_false($collection->every(fn ($item, $key) => strlen($item) > 3));
    }
);
