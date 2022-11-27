<?php

namespace Tests\Collection\LastKeyTest;

use Saeghe\Datatype\Collection;
use function Saeghe\TestRunner\Assertions\Boolean\assert_true;

test(
    title: 'it should last key item of the collection',
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
        assert_true(1 === $collection->last_key(), 'list key is not working');
    }
);

test(
    title: 'it should return any type as the last key item',
    case: function () {
        $collection = new class(['foo' => 'bar', null => 'foo']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true('' === $collection->last_key(), 'null key is not working');

        $collection = new class(['foo' => 'baz', 1 => 'bar']) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true(1 === $collection->last_key(), 'number key is not working');

        $collection = new class(['bar' => 'baz', 'foo' => ['bar']]) extends Collection {
            public function key_is_valid(mixed $key): bool
            {
                return true;
            }

            public function value_is_valid(mixed $value): bool
            {
                return true;
            }
        };
        assert_true('foo' === $collection->last_key(), 'string key is not working');
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
        assert_true(null === $collection->last_key(), 'key for empty collection is not working');
    }
);

test(
    title: 'it should return the last key one that meets the condition',
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
        assert_true('baz' === $collection->last_key(fn ($item) => $item === 2), 'key with closure is not working');
    }
);
