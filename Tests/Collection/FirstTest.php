<?php

namespace Tests\Collection\FirstTest;

use Saeghe\Datatype\Collection;
use function Saeghe\Datatype\Str\first_character;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should first item of the collection',
    case: function () {
        $collection = new class(['foo', 'baz']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true('foo' === $collection->first());
    }
);

test(
    title: 'it should return any type as the first item',
    case: function () {
        $collection = new class([null, 'foo']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true(null === $collection->first());

        $collection = new class([1, 'foo']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true(1 === $collection->first());

        $collection = new class([['bar'], 'foo']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true(['bar'] === $collection->first());
    }
);

test(
    title: 'it should return null when the given collection is empty',
    case: function () {
        $collection = new class([]) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true(null === $collection->first());
    }
);

test(
    title: 'it should return the first one that meets the condition',
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
        assert_true('bar' === $collection->first(fn ($item) => first_character($item) === 'b'));
    }
);
