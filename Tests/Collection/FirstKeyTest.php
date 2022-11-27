<?php

namespace Tests\Collection\FirstKeyTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should first key item of the collection',
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

        assert_true(0 === $collection->first_key(), 'list key is not working');
    }
);

test(
    title: 'it should return any type as the first key item',
    case: function () {
        $collection = new class([null => 'foo', 'foo' => 'bar']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true('' === $collection->first_key(), 'null key is not working');

        $collection = new class([1 => 'bar', 'foo' => 'baz']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true(1 === $collection->first_key(), 'number key is not working');

        $collection = new class(['foo' => ['bar'], 'bar' => 'baz']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true('foo' === $collection->first_key(), 'string key is not working');
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
        assert_true(null === $collection->first_key(), 'key for empty collection is not working');
    }
);

test(
    title: 'it should return the first key one that meets the condition',
    case: function () {
        $collection = new class(['foo' => 1, 'bar' => 2, 'baz' => 2]) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true('bar' === $collection->first_key(fn ($item) => $item === 2), 'key with closure is not working');
    }
);
